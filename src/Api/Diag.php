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
final class Diag implements Api
{
    /**
     * Clear inactive requests from the log.
     *
     * @Endpoint(name="diag:cmds:clear")
     *
     * @return Command
     */
    public function cmdsClear(): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Set how long to keep inactive requests in the log.
     *
     * @Endpoint(name="diag:cmds:set-time")
     *
     * @param string $arg time to keep inactive requests in log
     *
     * @return Command
     */
    public function cmdsSetTime(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Generates a network diagnostics report.
     *
     * @Endpoint(name="diag:net")
     *
     * @param string $vis output format
     *
     * @return Command
     */
    public function net(string $vis = 'text'): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Prints out system diagnostic information.
     *
     * @Endpoint(name="diag:sys")
     *
     * @return Command
     */
    public function sys(): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }
}