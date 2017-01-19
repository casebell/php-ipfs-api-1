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
final class Object implements Api
{
    /**
     * Outputs the raw bytes in an IPFS object.
     *
     * @Endpoint(primary=false, name="object:data")
     *
     * @param string $arg key of the object to retrieve, in base58-encoded multihash format
     *
     * @return Command
     */
    public function data(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Takes a diff of the two given objects.
     *
     * @Endpoint(primary=false, name="object:diff")
     *
     * @param string $arg     object to diff against
     * @param string $arg1    object to diff
     * @param bool   $verbose print extra information
     *
     * @return Command
     */
    public function diff(string $arg, string $arg1, bool $verbose = null): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Get and serialize the DAG node named by .
     *
     * @Endpoint(primary=false, name="object:get")
     *
     * @param string $arg key of the object to retrieve, in base58-encoded multihash format
     *
     * @return Command
     */
    public function get(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Outputs the links pointed to by the specified object.
     *
     * @Endpoint(primary=false, name="object:links")
     *
     * @param string $arg     key of the object to retrieve, in base58-encoded multihash format
     * @param bool   $headers print table headers (Hash, Size, Name)
     *
     * @return Command
     */
    public function links(string $arg, bool $headers = false): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Creates a new object from an ipfs template.
     *
     * @Endpoint(primary=false, name="object:new")
     *
     * @param string $arg template to use
     *
     * @return Command
     */
    public function new(string $arg = null): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Add a link to a given object.
     *
     * @Endpoint(primary=false, name="object:patch:add-link")
     *
     * @param string $arg    the hash of the node to modify
     * @param string $arg1   name of link to create
     * @param string $arg2   iPFS object to add link to
     * @param bool   $create create intermediary nodes
     *
     * @return Command
     */
    public function patchAddLink(string $arg, string $arg1, string $arg2, bool $create = false): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Append data to the data segment of a dag node.
     *
     * @Endpoint(primary=false, name="object:patch:append-data")
     *
     * @param string $arg  the hash of the node to modify
     * @param string $file data to append
     *
     * @return Command
     */
    public function patchAppendData(string $arg, string $file): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Remove a link from an object.
     *
     * @Endpoint(primary=false, name="object:patch:rm-link")
     *
     * @param string $arg  the hash of the node to modify
     * @param string $arg1 name of the link to remove
     *
     * @return Command
     */
    public function patchRmLink(string $arg, string $arg1): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Set the data field of an ipfs object.
     *
     * @Endpoint(primary=false, name="object:patch:set-data")
     *
     * @param string $arg  the hash of the node to modify
     * @param string $file the data to set the object to
     *
     * @return Command
     */
    public function patchSetData(string $arg, string $file): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Stores input as a DAG object, outputs its key.
     *
     * @Endpoint(primary=false, name="object:put")
     *
     * @param string $file         data to be stored as a DAG object
     * @param string $inputenc     encoding type of input data
     * @param string $datafieldenc encoding type of the data field, either "text" or "base64"
     *
     * @return Command
     */
    public function put(string $file, string $inputenc = 'json', string $datafieldenc = 'text'): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }

    /**
     * Get stats for the DAG node named by .
     *
     * @Endpoint(primary=false, name="object:stat")
     *
     * @param string $arg key of the object to retrieve, in base58-encoded multihash format
     *
     * @return Command
     */
    public function stat(string $arg): Command
    {
        return new Command(__METHOD__, get_defined_vars());
    }
}
