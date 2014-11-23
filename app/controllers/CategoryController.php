<?php

class CategoryController extends BaseController{


	public function iteminfo($ref_id){

		$iteminfo = $this->getItemInfo($ref_id);

		if($iteminfo['count'] <= 0){
			return Response::view('errors.file_not_found', array(), 404);
		}
		//print_r($iteminfo['result'][0]);
		//die();
		$searchResult = $this->searchItembyRefId($ref_id);
        $result = $searchResult['result'];
        $count = $searchResult['count'];
       //procuring_entity_org
        $orgId = $iteminfo['result'][0]['org_id'];
        $procuring_entity_org_id =$iteminfo['result'][0]['procuring_entity_org'];
		$orgInfo = $this->getOrganization($orgId);
		$orgInfo =$orgInfo['result'][0];
		// print_r($orgInfo);
		// die();
       return View::make('bid_item_info')
       ->with('i',$count)
       ->with('itemdesresult',$result)
       ->with('iteminfo',$iteminfo['result'][0])
       ->with('orgInfo',$orgInfo);

	}

	public function category($page){
	
		$per_page = 5;
		
		$page = (isset($page) && ctype_digit($page)) ? $page : 1;
	    $start = $per_page * $page;
	    //echo $start;die();
	    $posts = $this->getBiditems($start, $per_page);
	    $total_pages = ($posts['num_posts'] <= $page) ? 1 : ceil($posts['num_posts'] / $page);
         
		$result = $posts['result'];
		$count = $posts['count'];

		return View::make('bid_item')
		->with('page',$page)
		->with('result',$result)
		->with('i',$count)
		->with('total_pages',$total_pages);
	}


	function geturi($url){


		$url = str_replace(' ', '%20', $url);

		return $url;
	}

	 function getContentDataAttribute($data)
		{
			//$items[] = json_decode($content->content_data);
		    $data = json_decode($data,true);

		    return $data;
		}

	function getBiditems($start, $per_page){
		$query = 'SELECT * FROM "daa80cd8-da5d-4b9d-bb6d-217a360ff7c1"';
		if(isset($start) && isset($per_page))
			{
				$query .= " LIMIT $per_page OFFSET $start";		
			}
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$query;
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		$a = $responsec['result']['records'];
		$ai = count($a);
		$i = $this->getRowCount();

		//echo $ai.'<br/>'.$i;die();
	
		return array('result'=>$a,'num_posts' => $i,'count'=>$ai);
	}

	function getRowCount(){
		$query = 'SELECT count(*) FROM "daa80cd8-da5d-4b9d-bb6d-217a360ff7c1"';
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$query;
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		return $responsec['result']['records'][0]['count'];

		//print_r($responsec);die();
	}

	public function Ajaxcategorysearch(){

		$validator = Validator::make(Input::all(),
                array(
                    'search'            => 'required'
                )
            );

            if($validator->fails()){
                return 'Search field is required!';

            }else{
            	$search = Input::get('search');
            	$searchResult = $this->searchItem($search);
            	$result = $searchResult['result'];
            	$count = $searchResult['count'];
            
            	if (Request::ajax()) {
                	return View::make('ajax.bid_item')
                	->with('result',$result)
					->with('i',$count);
				}
				return View::make('ajax.bid_item')
                	->with('result',$result)
					->with('i',$count);

            }
	}

	function searchItem($itemName){
		$itemName = $itemName.'%';
		$itemName = "'".$itemName."'";
		$q = 'SELECT * FROM "daa80cd8-da5d-4b9d-bb6d-217a360ff7c1" WHERE item_name LIKE '.$itemName;
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$q;
	
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
			//echo $urlc;die();
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		$a = $responsec['result']['records'];
		$ai = count($a);

		return array('result'=>$a,'count'=>$ai);

	}


	function getItemInfo($ref_id){
		$ref_id = "'".$ref_id."'";
		$q = 'SELECT * from "baccd784-45a2-4c0c-82a6-61694cd68c9d" WHERE ref_id = '.$ref_id;
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$q;
		
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
			//echo $urlc;die();
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		$a = $responsec['result']['records'];
		$ai = count($a);
		return array('result'=>$a,'count'=>$ai);

	}

	function searchItembyRefId($ref_id){
		$ref_id = "'".$ref_id."'";
		$q = 'SELECT * FROM "daa80cd8-da5d-4b9d-bb6d-217a360ff7c1" WHERE ref_id = '.$ref_id;
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$q;
	
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
			//echo $urlc;die();
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		$a = $responsec['result']['records'];
		$ai = count($a);

		return array('result'=>$a,'count'=>$ai);

	}


	 function getOrganization($orgId){

		$orgId = "'".$orgId."'";
		
		$q = 'SELECT * from "ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1" WHERE org_id = '.$orgId;
		$urlc = "http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=".$q;
		
		//echo $urlc;die();
		$urlc= $this->geturi($urlc);
			//echo $urlc;die();
		$responsec = file_get_contents($urlc);
		$responsec = $this->getContentDataAttribute($responsec);
		$a = $responsec['result']['records'];
		$ai = count($a);
		return array('result'=>$a,'count'=>$ai);

	}


	public function postpostbid(){
				 if(Input::get('is_org_foreign') == ''){
				 	$is_org_foreign = 0;
				 }else{
				 	$is_org_foreign = 1;
				 }
				
		      $validator = Validator::make(Input::all(),
                array(
                    'org_reg_date'      =>'required|date_format:Y-m-d',
                    'captcha'			=> 'required|captcha',
                    'membertype'		=>'required|min:5|max:20',
                    'org_name'			=>'required|min:5|max:50',
                    'country_code'		=>'required|min:2|max:10',
                    'country'			=>'required|min:3|max:50',
                    'region'			=>'required|min:3|max:50',
                    'address1'			=>'required|min:3|max:150',
                  	'zip_code'			=>'required|min:1|max:10'
                ),
				array(
					'captcha'		=> 'invalid captcha'
					));
            if($validator->fails()){

                return Redirect::route('bid-item-info',Input::get('ref'))
                    ->withErrors($validator);
            }else{
            	return 'success';
            	die();
            }
	}
	//http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=SELECT * FROM "daa80cd8-da5d-4b9d-bb6d-217a360ff7c1" WHERE item_name LIKE 'Office Supplies%'

}