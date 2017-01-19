<?php

declare(strict_types=1);

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <https://github.com/digitalkaoz/php-ipfs>
 */

namespace IPFS\Api;

use IPFS\Annotation\Api as Endpoint;
use IPFS\Command\Command;

/**
 * @author Robert Schönthal <robert.schoenthal@gmail.com>
 * @autogenerated
 * @codeCoverageIgnore
 */
final class Swarm implements Api
{
    /**
     * List local addresses.
     *
     * @Endpoint(primary=false, name="swarm:addrs:local")
     *
     * @param bool $id show peer ID in addresses
     *
     * @return Command
     */
    public function addrsLocal(bool $id = false): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Open connection to a given address.
     *
     * @Endpoint(primary=false, name="swarm:connect")
     *
     * @param string $arg address of peer to connect to
     *
     * @return Command
     */
    public function connect(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Close connection to a given address.
     *
     * @Endpoint(primary=false, name="swarm:disconnect")
     *
     * @param string $arg address of peer to disconnect from
     *
     * @return Command
     */
    public function disconnect(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Add an address filter.
     *
     * @Endpoint(primary=false, name="swarm:filters:add")
     *
     * @param string $arg multiaddr to filter
     *
     * @return Command
     */
    public function filtersAdd(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Remove an address filter.
     *
     * @Endpoint(primary=false, name="swarm:filters:rm")
     *
     * @param string $arg multiaddr filter to remove
     *
     * @return Command
     */
    public function filtersRm(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * List peers with open connections.
     *
     * @Endpoint(primary=false, name="swarm:peers")
     *
     * @param bool $verbose also display latency along with peer information in the following form:
     *
     * @return Command
     */
    public function peers(bool $verbose = null): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }
}
