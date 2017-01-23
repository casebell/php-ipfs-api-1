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

/**
 * @author Robert Schönthal <robert.schoenthal@gmail.com>
 * @autogenerated
 * @codeCoverageIgnore
 */
final class Config implements Api
{
    /**
     * Opens the config file for editing in $EDITOR.
     *
     * @Endpoint(name="config:edit")
     *
     * @return Command
     */
    public function edit(): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Replaces the config with .
     *
     * @Endpoint(name="config:replace")
     *
     * @param string $file the file to use as the new config
     *
     * @return Command
     */
    public function replace(string $file): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Outputs the content of the config file.
     *
     * @Endpoint(name="config:show")
     *
     * @return Command
     */
    public function show(): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }
}