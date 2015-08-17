<?php namespace Oogle\Infrastructure\Hashing\Hashers;

use RuntimeException;
use Oogle\Domain\Contracts\IHasher;

class NativeHasher implements IHasher
{
    /**
     * {@inheritDoc}
     */
    public function hash($value)
    {
        if (! $hash = password_hash($value, PASSWORD_DEFAULT)) {
            throw new RuntimeException('Error hashing value. Check system compatibility with password_hash().');
        }

        return $hash;
    }

    /**
     * {@inheritDoc}
     */
    public function check($value, $hashedValue)
    {
        return password_verify($value, $hashedValue);
    }
}
