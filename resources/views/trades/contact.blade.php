<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">请填写您的联系方式,以方便联系</h4>
		</div>
		<div class="modal-body">
			{!! Form::model($user, ['method'=>'PUT','id'=>'info_form','class'=>'form-horizontal clearfix','action'=>array('UsersController@update')]) !!}
				<div class="form-group">
					<label class="col-md-2 control-label" for="name"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 姓名</label>
					<div class="col-md-9">
						{!! Form::text('name',null,array('class'=>'form-control','placeHolder'=>'请填写您的真实姓名')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 邮箱</label>
					<div class="col-md-9">
						{!! Form::text('email',null,array('class'=>'form-control','placeHolder'=>'请填写您的邮箱Email')) !!}
					</div>
				</div>				
				<div class="form-group">
					<label class="col-md-2 control-label" for="phone"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> 座机</label>
					<div class="col-md-9">
						{!! Form::text('phone',null,array('class'=>'form-control','placeHolder'=>'请填写您的电话号码')) !!}					
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="mobilephone"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 手机</label>
					<div class="col-md-9">
						{!! Form::text('mobilephone',null,array('class'=>'form-control','placeHolder'=>'请填写您的手机号码')) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">取消提醒</button>
		<button type="button" class="btn btn-primary">确认提醒</button>
		</div>
	</div>
  </div>