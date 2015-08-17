<?php namespace Oogle\Infrastructure\Hashing;

use Oogle\Infrastructure\Hashing\Hashers\BcryptHasher;
use Oogle\Domain\Contracts\IHashingService;

class BcryptHashingService implements IHashingService {

	/**
	 * INotifier interface to be implemented
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
   public function __construct(BcryptHasher $hasher)
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