<?php namespace Oogle\Infrastructure\Hashing;

use Oogle\Domain\Contracts\IHasher;
use Oogle\Domain\Contracts\IHashingService;

class HashingService implements IHashingService {

	/**
	 * HashingService implementation
   * This implementation is generic and works
   * with any Hasher
	 */

     /**
   * @var Illuminate\Hashing\BcryptHasher
   */
    private $hasher;
 
  /**
   * Create a new BcryptHashingService
   *
   * @param BcryptHasher $hasher
   * @return void
   */
   public function __construct(IHasher $hasher)
   {
     $this->hasher = $hasher;
   }
 
  /**
   * Create a new HashedPassword
   *
   * @param Password $password
   * @return HashedPassword
   */
   public function hash(Password $password)
   {
     return new HashedPassword($this->hasher->hash((string) $password));
   }
} 