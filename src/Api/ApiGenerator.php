<?php

declare(strict_types=1);

/*
 * This file is part of the "php-ipfs" package.
 *
 * (c) Robert Schönthal <robert.schoenthal@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IPFS\Api;

use IPFS\Annotation\Api as Endpoint;
use IPFS\Command\Command;
use IPFS\Utils\CaseFormatter;
use PhpParser\Builder\Method;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\PrettyPrinter\Standard;

class ApiGenerator
{
    /**
     * @var BuilderFactory
     */
    private $builder;
    /**
     * @var string
     */
    private $location;

    public function __construct(BuilderFactory $builder, $location = __DIR__)
    {
        $this->builder = $builder;
        $this->location = $location;
    }

    public function build(array $configs)
    {
        foreach ($configs as $name => $config) {
            $methods = [];

            foreach ($config as $methodConfig) {
                $method = $this->buildMethodNode($methodConfig);

                $methods[] = $method;
            }

            $header = $this->buildHeaderNode();
            $class = $this->buildClassNode($name, $methods);

            $prettyPrinter = new Standard();

            file_put_contents(
                $this->location . '/' . ucfirst(CaseFormatter::dashToCamel($name)) . '.php',
                $prettyPrinter->prettyPrintFile([$header, $class])
            );
        }
    }

    private function buildMethodNode(array $methodConfig): Method
    {
        $method = $this->builder
            ->method($methodConfig['method'])
            ->makePublic()
            ->setReturnType('Command')
            ->setDocComment($this->buildDocBlock($methodConfig));

        foreach ($methodConfig['arguments'] as $parameterConfig) {
            $parameter = $this->builder
                ->param($parameterConfig['name'])
                ->setTypeHint($parameterConfig['type']);

            if (!$parameterConfig['required']) {
                $default = $parameterConfig['default'];

                if ($parameterConfig['type'] === 'int') {
                    $default = (int) $default;
                }
                $parameter->setDefault($default);
            }

            $method->addParam($parameter);
        }

        $method->addStmt(new Node\Stmt\Return_(
            new Node\Expr\New_(new Node\Name('Command'), [
                new Node\Scalar\MagicConst\Method(),
                new Node\Expr\FuncCall(new Node\Name('get_defined_vars')),
            ])
        ));

        return $method;
    }

    private function buildClassNode(string $name, array $methods): Node
    {
        return $this->builder->namespace('IPFS\Api')
            ->addStmt($this->builder->use(Endpoint::class)->as('Endpoint'))
            ->addStmt($this->builder->use(Command::class))
            ->addStmt(
                $this->builder->class($name)
                    ->implement('Api')
                    ->addStmts($methods)
                    ->setDocComment(
                        <<<'EOS'
/**
 * @author Robert Schönthal <robert.schoenthal@gmail.com>
 * @autogenerated
 * @codeCoverageIgnore
 */
EOS
                    )
                    ->makeFinal()
            )
            ->getNode();
    }

    private function buildDocBlock(array $methodConfig): string
    {
        $params = count($methodConfig['arguments']) ? '' : '*';

        foreach ($methodConfig['arguments'] as $index => $argument) {
            $suffix = $index + 1 === count($methodConfig['arguments']) ? "\n*" : "\n";
            $params .= sprintf('* @param %s $%s %s%s', $argument['type'], $argument['name'], $argument['description'], $suffix);
        }

        return <<<EOS
/**
 * {$methodConfig['description']}
 *
 * @Endpoint(name="{$methodConfig['parts']}")
 *
 {$params}
 * @return Command
 */
EOS;
    }

    private function buildHeaderNode(): Node
    {
        return new Node\Stmt\Declare_(
            [new Node\Stmt\DeclareDeclare('strict_types', new Node\Scalar\LNumber(1))]
        );
    }
}
