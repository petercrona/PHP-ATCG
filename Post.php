<?php
namespace Test;

/**
 * Description of Test
 *
 * @author peter
 */
class Post {
    
	/** Add post
	 * @requires \params(string, string) && \validate()
	 * @ensures \resultHasType(boolean) && \inDB(posts, posts.title==$title AND posts.category = $category_id)
	 */
	public function add($title, $text) {

	}

	/** Delete post
	 * @requires \params(int, title) && \inDB(posts, posts.title==$title AND posts.category = $category_id) && \validate()
	 * @ensures \notInDB(posts, posts.title==$title AND posts.category = $category_id)
	 */
	public function delete($category_id, $title) {

	}

}
?>