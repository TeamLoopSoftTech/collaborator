@extends('layout.main')

@section('content')
<div class="wrapper">
  <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-info"></i> Bid Notice Abstract</h3>
              </div>
              <div class="panel-body">
               	<center>
               		<h4>Invitation to Bid (ITB)</h4>
               	</center>
               	<table class="table">
               		<tr><td width="20%"><b>Reference Number :</b></td><td colspan="2" aligin="left">{{$iteminfo['ref_no']}}</td></tr>
               		<tr><td width="20%"><b>Procuring Entity :</b></td><td colspan="2" aligin="left">{{$iteminfo['procuring_entity_org']}}</td></tr>
               		<tr><td width="20%"><b>Title :</b></td><td colspan="2" aligin="left">{{$iteminfo['tender_title']}}</td></tr>
               		<tr><td width="20%"><b>Area of Delivery :</b></td><td colspan="2" aligin="left">{{$iteminfo['collection_point']}}</td></tr>
               	</table>
               	<table class="table">
               		<tr>
               			<td>
               				<table class="table">
               					<tr><td><b>Solicitation Number :</b></td><td>{{$iteminfo['solicitation_no']}}</td></tr>
               					<tr><td><b>Trade Agreement :</b></td><td>{{$iteminfo['trade_agreement']}}</td></tr>
               					<tr><td><b>Procurement Mode :</b></td><td>{{$iteminfo['procurement_mode']}}</td></tr>
               					<tr><td><b>Classification :</b></td><td>{{$iteminfo['classification']}}</td></tr>
               					<tr><td><b>Category :</b></td><td>{{$iteminfo['business_category']}}</td></tr>
               					<tr><td><b>Approved Budget for the Contract :</b></td><td>{{$iteminfo['approved_budget']}}</td></tr>
               					<tr><td><b>Delivery Period :</b></td><td>{{$iteminfo['solicitation_no']}}</td></tr>
               					<tr><td><b>Client Agency :</b></td><td>{{$iteminfo['client_agency_org']}}</td></tr>
               					<tr><td><b>Contact Person :</b></td><td>{{$iteminfo['contact_person']}}</td></tr>
               					<tr><td></td><td>{{$iteminfo['contact_person_address']}}</td></tr>
               				</table>	
               			</td>
               			<td>
               				<table class="table table-bordered">
               					<tr><td><b>Status :</b></td><td>{{$orgInfo['org_status']}}</td></tr>
               					<tr><td><b>Associated Components :</b></td><td></td></tr>
               					<tr><td><b>Bid Supplements :</b></td><td></td></tr>
               					<tr><td><b>Document Request List :</b></td><td></td></tr>
               					<tr><td><b>Date Published:</b></td><td>{{$iteminfo['date_available']}}</td></tr>
               					<tr><td><b>Last Updated / Time :</b></td><td>{{$iteminfo['modified_date']}}</td></tr>
               					<tr><td><b>Closing Date / Time :</b></td><td>{{$iteminfo['closing_date']}}</td></tr>
               				</table>
               			</td>	
               		</tr>	
               	</table class="table table-bordered">
               	<tr><td><b>Description :</b></td><td>{{$iteminfo['description']}}</td></tr>
               	<tr><td>
               		<table class="table table-bordered">
               			<th>Item No</th>
               			<th>Item Name</th>
               			<th>Description</th>
               			<th>Quantity</th>
               			<th>UOM</th>
               			<th>Amount</th>
               			<th>Total Amount</th>
               			<?php 
               				$ii = 0;
               				$totalAmt =0;
               				while($ii != $i){
               					$tmptotalAmt = $itemdesresult[$ii]['budget'] * $itemdesresult[$ii]['qty'];
               					$totalAmt = $tmptotalAmt + $totalAmt;
               					echo'<tr><td>'.$itemdesresult[$ii]['line_item_id'].'</td>
               					<td>'.$itemdesresult[$ii]['item_name'].'</td>
               					<td>'.$itemdesresult[$ii]['item_description'].'</td>
               					<td>'.$itemdesresult[$ii]['qty'].'</td>
               					<td>'.$itemdesresult[$ii]['uom'].'</td>
               					<td>'.$itemdesresult[$ii]['budget'].'</td>
               					<td>PhP '.$itemdesresult[$ii]['budget'] * $itemdesresult[$ii]['qty'].'</td>
               					</tr>';
               					
               					$ii++;
               					if($ii == $i)
               					{
               						echo '<tr><td colspan="6"><b>Total :</b></td><td>PhP '.$totalAmt.'</td></tr>';
               					}
               				}
               			?>
               		</table>
               	</td></tr>
               	<table>

               	</table>
              </div>
            </div>
          </div>
 </div><!-- /.row -->


    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if(Session::has('success'))
                <div class="alert-box success">
                    <p>{{ Session::get('success') }} <a href="#">here</a> to continue</p>
                </div>
                @endif
                <h4>Buy Bid</h4>
            </div>
            <div class="modal-body">
                <form action="{{URL::route('post-bid')}}" method="post">
                <div class="form-group {{($errors->has('membertype')) ? 'has-error has-feedback' : ''}}">
                    <label for="membertype" class="control-label">Member Type</label>
                    <input type="text" class="form-control" id="membertype" placeholder="Enter member type" name="membertype" {{(Input::old('membertype')) ? ' value="'.e(Input::old('membertype')).'"' : ''}}>
                    @if($errors->has('membertype'))
                    <p class="help-block">{{$errors->first('membertype')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('parent_org_id')) ? 'has-error has-feedback' : ''}}">
                    <label for="parent_org_id" class="control-label">Parent Organization Id</label>
                    <input type="text" class="form-control" id="parent_org_id" placeholder="Enter Parent Organization Id" name="parent_org_id" {{(Input::old('parent_org_id')) ? ' value="'.e(Input::old('parent_org_id')).'"' : ''}}>
                    @if($errors->has('parent_org_id'))
                     <p class="help-block">{{$errors->first('parent_org_id')}}</p>
                     <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('is_org_foreign')) ? 'has-error has-feedback' : ''}}">
                    <label for="is_org_foreign" class="control-label">Is Organiztion Foreign? <input type="checkbox" value="1" name="is_org_foreign"></label>
                </div>
                <div class="form-group {{($errors->has('org_name')) ? 'has-error has-feedback' : ''}}">
                    <label for="org_name" class="control-label">Organization Name</label>
                    <input type="text" class="form-control" id="org_name" placeholder="Enter Organization Name" name="org_name" {{(Input::old('org_name')) ? ' value="'.e(Input::old('org_name')).'"' : ''}}>
                    @if($errors->has('org_name'))
                    <p class="help-block">{{$errors->first('org_name')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('government_branch')) ? 'has-error has-feedback' : ''}}">
                    <label for="government_branch">Government Branch</label>
                    <input type="text" class="form-control" id="government_branch" placeholder="Government Branch" name="government_branch" {{(Input::old('government_branch')) ? ' value="'.e(Input::old('government_branch')).'"' : ''}}>
                    @if($errors->has('government_branch'))
                    <p class="help-block">{{$errors->first('government_branch')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('government_organization_type')) ? 'has-error has-feedback' : ''}}">
                    <label for="government_organization_type">Government Organization Type</label>
                    <input type="text" class="form-control" id="government_organization_type" placeholder="Government Organization Type" name="government_organization_type" {{(Input::old('government_organization_type')) ? ' value="'.e(Input::old('government_organization_type')).'"' : ''}}>
                    @if($errors->has('government_organization_type'))
                    <p class="help-block">{{$errors->first('government_organization_type')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('supplier_form_of_organization')) ? 'has-error has-feedback' : ''}}">
                    <label for="supplier_form_of_organization">Supplier form of Organization</label>
                    <input type="text" class="form-control" id="supplier_form_of_organization" placeholder="Supplier form of organization" name="supplier_form_of_organization" {{(Input::old('supplier_form_of_organization')) ? ' value="'.e(Input::old('supplier_form_of_organization')).'"' : ''}}>
                    @if($errors->has('supplier_form_of_organization'))
                    <p class="help-block">{{$errors->first('supplier_form_of_organization')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('supplier_organization_type')) ? 'has-error has-feedback' : ''}}">
                    <label for="supplier_organization_type">Supplier Organization Type</label>
                    <input type="text" class="form-control" id="supplier_organization_type" placeholder="supplier_organization_type" name="supplier_organization_type" {{(Input::old('supplier_organization_type')) ? ' value="'.e(Input::old('supplier_organization_type')).'"' : ''}}>
                    @if($errors->has('supplier_organization_type'))
                    <p class="help-block">{{$errors->first('supplier_organization_type')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('org_reg_date')) ? 'has-error has-feedback' : ''}}">
                    <label for="org_reg_date">Org Registration Date</label>
                    <input type="date" class="form-control" id="org_reg_date"  name="org_reg_date" placeholder ="YYYY-mm-dd" {{(Input::old('org_reg_date')) ? ' value="'.e(Input::old('org_reg_date')).'"' : ''}}>
                    @if($errors->has('org_reg_date'))
                    <p class="help-block">{{$errors->first('org_reg_date')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('wbsite')) ? 'has-error has-feedback' : ''}}">
                    <label for="wbsite">Web Site</label>
                    <input type="text" class="form-control" id="wbsite" placeholder="www.example.com" name="wbsite" {{(Input::old('wbsite')) ? ' value="'.e(Input::old('wbsite')).'"' : ''}}>
                    @if($errors->has('wbsite'))
                    <p class="help-block">{{$errors->first('wbsite')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('org_description')) ? 'has-error has-feedback' : ''}}">
                    <label for="org_description">Organization Description</label>
                    <input type="text" class="form-control" id="org_description"  name="org_description" {{(Input::old('org_description')) ? ' value="'.e(Input::old('org_description')).'"' : ''}}>
                    @if($errors->has('org_description'))
                    <p class="help-block">{{$errors->first('org_description')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                   <div class="form-group {{($errors->has('org_description')) ? 'has-error has-feedback' : ''}}">
                    <label for="org_description">Organization Description</label>
                    <input type="text" class="form-control" id="org_description"  name="org_description" {{(Input::old('org_description')) ? ' value="'.e(Input::old('org_description')).'"' : ''}}>
                    @if($errors->has('org_description'))
                    <p class="help-block">{{$errors->first('org_description')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('country_code')) ? 'has-error has-feedback' : ''}}">
                    <label for="country_code">Country Code</label>
                    <input type="text" class="form-control" id="country_code"  name="country_code" {{(Input::old('country_code')) ? ' value="'.e(Input::old('country_code')).'"' : ''}}>
                    @if($errors->has('country_code'))
                    <p class="help-block">{{$errors->first('country_code')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                  <div class="form-group {{($errors->has('country')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country"  name="country" {{(Input::old('country')) ? ' value="'.e(Input::old('country')).'"' : ''}}>
                    @if($errors->has('country'))
                    <p class="help-block">{{$errors->first('country')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('region')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Region</label>
                    <input type="text" class="form-control" id="region"  name="region" {{(Input::old('region')) ? ' value="'.e(Input::old('region')).'"' : ''}}>
                    @if($errors->has('region'))
                    <p class="help-block">{{$errors->first('region')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('province')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Province</label>
                    <input type="text" class="form-control" id="province"  name="province" {{(Input::old('province')) ? ' value="'.e(Input::old('province')).'"' : ''}}>
                    @if($errors->has('province'))
                    <p class="help-block">{{$errors->first('province')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('city')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">City</label>
                    <input type="text" class="form-control" id="city"  name="city" {{(Input::old('city')) ? ' value="'.e(Input::old('city')).'"' : ''}}>
                    @if($errors->has('city'))
                    <p class="help-block">{{$errors->first('city')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('address1')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Address1</label>
                    <input type="text" class="form-control" id="address1"  name="address1" {{(Input::old('address1')) ? ' value="'.e(Input::old('address1')).'"' : ''}}>
                    @if($errors->has('address1'))
                    <p class="help-block">{{$errors->first('address1')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                <div class="form-group {{($errors->has('zip_code')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Zip Code</label>
                    <input type="text" class="form-control" id="zip_code"  name="zip_code" {{(Input::old('zip_code')) ? ' value="'.e(Input::old('zip_code')).'"' : ''}}>
                    @if($errors->has('zip_code'))
                    <p class="help-block">{{$errors->first('zip_code')}}</p>
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    @endif
                </div>
                 <div class="form-group {{($errors->has('zip_code')) ? 'has-error has-feedback' : ''}}">
                    <label for="country">Organization Status</label>
                    <select name="active">
                    	<option value="Active">Active</option>
                    	<option value="InActive">In Active</option>
                    </select>
                 </div>
                  <div class="form-group">
                    <label for="captcha">{{HTML::image(Captcha::img(), 'Captcha image')}} Please Enter Captcha Code
                     </label>
                    <input type="text" class="form-control" id="captcha" placeholder="Please Enter Captcha Code" name="captcha" {{(Input::old('captcha')) ? ' value="'.e(Input::old('captcha')).'"' : ''}}>
                    @if($errors->has('captcha'))
                    {{$errors->first('captcha')}}
                    @endif
                </div>
                <input type="hidden" name='ref' value="{{e($iteminfo['ref_no'])}}">
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                </div>
                {{Form::token()}}
            </form>
            </div>
        </div>
    </div>

</div>
<!-- <h1>Item Info</h1>
<pre>
	<?php print_r($iteminfo);?>
</pre>
<h1>itemdesresult</h1>
<pre>
	<?php print_r($itemdesresult);?>
</pre>
<h1>orgInfo</h1>
<pre>
	<?php print_r($orgInfo);?>
</pre> -->
@stop