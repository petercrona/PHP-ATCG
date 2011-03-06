<?php
namespace Test;

/**
 * Description of Test
 *
 * @author peter
 */
class User {
    
	/** Login a user
	 * @requires \params(string, string) && \equals($username, 'hej')
	 * @ensures \resultHasType(boolean)
	 */
	public function login($username, $password) {

	}

	/** Register a user
	 * @requires \params(string, string, string, boolean) && \validate()
	 * @ensures \inDB(users, users.username==$username)
	 */
	public function register($username, $password, $email, $active) {

	}

	/** Delete a user
	 * @requires \params(string) && \inDB(users, users.username==$username) && \validate()
	 * @ensures \notInDB(users, users.username==$username)
	 */
	public function delete($username) {

	}

}
?>