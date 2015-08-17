<?php namespace Oogle\Infrastructure\Hashing\Hashers;

use Oogle\Domain\Contracts\IHasher;

class WhirlpoolHasher implements IHasher
{

    use Hasher;

    /**
     * {@inheritDoc}
     */
    public function hash($value)
    {
        $salt = $this->createSalt();

        return $salt.hash('whirlpool', $salt.$value);
    }

    /**
     * {@inheritDoc}
     */
    public function check($value, $hashedValue)
    {
        $salt = substr($hashedValue, 0, $this->saltLength);

        return $this->slowEquals($salt.hash('whirlpool', $salt.$value), $hashedValue);
    }
}
