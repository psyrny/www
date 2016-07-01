<?php

namespace App\FrontModule\Presenters;

use Nette;
use	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	//private $limitPerPage = 6;

	/*public function beforeRender()
	{
		parent::beforeRender();
		$this->template->mostPopularPost = $this->posts->getMostPopularPostInWeek();
	}


	public function renderDefault($page=1)
	{
		$this->template->page = $page;
		$this->template->postsHero = $this->posts->getPostsHero();
		$heroPostsArray = $this->posts->pairPostsHeroIds();
		
		$postsSmall = $this->posts->getPostsLimited($page)->where('id NOT ?', $heroPostsArray);
		$this->template->postsSmall = $postsSmall;
		$this->template->isAjax = false;
		$this->template->hypedPost = $this->posts->getHypedPost();
	}
	public function renderArticle($id, $page=1)
	{
		if($id) {
			//One article
			$this->template->post = $this->posts->getPost($id);
			$this->template->gallery = $this->posts->getGallery($id);

			//Other articles
			// $heroPostsArray = $this->posts->pairPostsHeroIds();
			$postsSmall = $this->posts->getPostsLimited($page)->where('id != ?', $id);
			$this->template->postsSmall = $postsSmall;
			$this->template->isAjax = false;
			$this->template->page = $page;
		}else{
			$this->redirect('Homepage:default');
		}
	}

	public function renderHashtag($hashtag, $page=1)
	{
		if($hashtag){
			$count = $this->posts->countPostsWidthHashtag($hashtag);
			if ($count != 0) {
				$this->template->hashtag = $this->hashtags->getHashtag($hashtag);
				$this->template->posts = $this->posts->getPostsWithHashtag($hashtag, $page)->select('post.*');
				$this->template->gallery = $this->posts->getGallery($hashtag);
				$this->template->isAjax = false;
				$this->template->page = $page;
			}else{
				$this->redirect('Homepage:default');
			}
		}else{
			$this->redirect('Homepage:default');
		}
	}

	public function renderSearch($value=null)
	{
		if($value) {
			$this->template->searchedPosts = $this->posts->getSearchedPosts($value);
		}
		$this->template->value = $value;
	}

	public function renderSitemap()
	{
		$this->template->posts = $this->posts->getPosts();
	}

	public function getAuthor($post_id)
	{
		return $this->getPost($post_id)->user;
	}

	public function handleChangePage($page=1)
	{
		$this->template->page = $page;
		$this->template->isAjax = $this->isAjax();
		$posts = $this->posts->getPostsLimited($page, $this->limitPerPage);
		if(!empty($posts)) {
			$this->template->postsSmall = $posts;
			$this->redrawControl();
		}else{
			$this->redirect('Homepage:default');
			return false;
		}
	}

	public function handleAddVote($item_id)
	{
		if ($item_id) {
			$item = $this->polls->getPollItem($item_id);
			if ($item) {
				$this->polls->addVote($item_id);
				$this->redrawControl('poll');
				$this->redrawControl('article-scripts');
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function countAllVotesInPoll($pollId)
	{
		$items = $this->polls->getPollItems($pollId);
		return $items->sum('votes');
	}

	public function handleSearch($value)
	{
		if($value){
			$this->template->searchedPosts = $this->posts->getSearchedPosts($value);
		}else{
			$this->template->value = null;
		}
		$this->redrawControl('search');
	}

	public function getSearchedContent($content, $value)
	{
		$content = trim($content);
		$explode = explode($value, $content);
		if ($explode) {
			$strongedValue = "<strong>".$value."</strong>";
			$valuePositon = strpos($content, $value);

			if ($valuePositon) {
				$finalContent = $strongedValue;
				
				if(count($explode) > 0) {
					$firstPart = $explode[0];
					$firstPart = substr($firstPart, ($valuePositon-80), $valuePositon);
					$finalContent = '...'.$firstPart.''.$finalContent;
				}
				if(count($explode) > 2) {
					$secondPart = $explode[1];
					$secondPart = substr($secondPart, 0, 80);
					$finalContent = $finalContent.''.$secondPart.'...';
				}
			}else{
				$finalContent = substr($content, 0, 160).'...';
			}

			return $finalContent;
		}

		return $content;
	}

	public function handleAddViewToPost($post_id)
	{
		if($post_id) {
			return $this->posts->addViewToPost($post_id);
		}else{
			return false;
		}
	}

	public function getPost($postId)
	{
		if ($postId) {
			return $this->posts->getPost($postId);
		}
	}

	public function canGetNextPage($page)
	{
		if($page) {
			return $this->posts->canGetNextPage($page, $this->limitPerPage);
		}
	}

	public function countGalleryString($postId)
	{
		if ($this->posts->getGallery($postId)->count()) {
			$count = $this->posts->getGallery($postId)->count();
			$txt = 'obrázků';
			if ($count == 1) { $txt = 'obrázek'; }
			if ($count == 2) { $txt = 'obrázky'; }
			if ($count == 3) { $txt = 'obrázky'; }
			if ($count == 4) { $txt = 'obrázky'; }

			return $count.' '.$txt;
		}else{
			return false;
		}
	}*/

	

}
