<?php


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json; charset=utf-8');


ini_set('session.cookie_domain', '.sandbox.test' );
session_start();


if (!isset($_GET['action']) || $_GET['action'] == '') {
	$action = '';
} else {
	$action = $_GET['action'];
}


switch ($action) {
	case 'user:auth':
		if (isset($_POST['username']) && isset($_POST['password'])) {
			if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
				$_SESSION['user'] = 1;
				echo json_encode([
					'status' => true,
					'message' => 'user admin logged in'
				]);
			}
		} else {
			http_response_code(401);
			echo json_encode([
				'status' => false,
				'message' => 'credentials are not sent'
			]);
		}
		break;

	case 'user:profile':
		if (isset($_SESSION['user'])) {
			echo json_encode([
				'status' => true,
				'message' => 'user profile',
				'data' => [
					'name' => 'Foo Bar',
					'email' => 'email@example.com',
				]
			]);
		} else {
			http_response_code(401);
			echo json_encode([
				'status' => false,
				'message' => 'user should login first'
			]);
		}
		break;

	case 'user:logout':
		if (isset($_SESSION['user'])) {
			$_SESSION['user'] = null;
			session_destroy();
			echo json_encode([
				'status' => true,
				'message' => 'user logout successfully'
			]);
		} else {
			http_response_code(401);
			echo json_encode([
				'status' => false,
				'message' => 'user should be logged in before logout'
			]);
		}
		
		break;

	case 'debug:session':
		echo json_encode($_SESSION);
		break;
	
	default:
		http_response_code(404);
		echo json_encode([
			'status' => false,
			'message' => 'action is not defined'
		]);
		break;
}









