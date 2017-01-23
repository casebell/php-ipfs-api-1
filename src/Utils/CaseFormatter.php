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

namespace IPFS\Utils;

use Camel\CaseTransformer;
use Camel\Format\CamelCase;

class CaseFormatter
{
    public static function camelToColon($value)
    {
        return (new CaseTransformer(new CamelCase(), new ConfigurableFormatter(':')))->transform($value);
    }

    public static function colonToCamel($value)
    {
        return (new CaseTransformer(new ConfigurableFormatter(':'), new CamelCase()))->transform($value);
    }

    public static function dashToCamel($value)
    {
        return (new CaseTransformer(new ConfigurableFormatter('-'), new CamelCase()))->transform($value);
    }

    public static function camelToDash($value)
    {
        return (new CaseTransformer(new CamelCase(), new ConfigurableFormatter('-')))->transform($value);
    }

    public static function dashToCamelArray(array $values): array
    {
        return array_combine(array_map(function ($name) {
            return self::dashToCamel($name);
        }, array_keys($values)), array_values($values));
    }

    public static function stringToBool($value)
    {
        return is_string($value) && in_array(strtolower($value), ['true', 'false'], true) ? filter_var($value, FILTER_VALIDATE_BOOLEAN) : $value;
    }
}
