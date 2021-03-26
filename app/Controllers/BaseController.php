<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use \Config\Services;
use \App\Models\EventsModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url', 'text', 'html', 'inflector'];
    protected $pager;

    /**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// service::session
		// $this->session = \Config\Services::session();
		// db::connect
		// $this->db = \Config\Database::connect();
        // pager
        $this->pager = Services::pager();
	}

	public function event_search(EventsModel $events): EventsModel
    {
        if ($search_category = service('request')->getGet('c')) {
            $events->where('category', clean_number($search_category));
        }
        if ($search_title = service('request')->getGet('q')) {
            $search_title = clean_string($search_title);
            $events->groupStart();
            $events->orLike('title', $search_title);
            $events->orLike('content', $search_title);
            $events->orLike('tags', $search_title);
            $events->groupEnd();
        }
        return $events;
    }
}
