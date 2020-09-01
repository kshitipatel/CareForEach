@extends('Home')
@section('content')

<div class="col-sm-12 w3-agileits-crd widgettable">

  <div class="card card-contact-list">
    <div class="agileinfo-cdr">
      <div class="card-header">
        <h3>Employees</h3>
        <a href="{{ route('employee.add') }}"><button type = "button" class = "btn btn-success" style="float: right;"><i class="fa fa-plus"></i> </button></a>
      </div>
      <br>
      <hr class="widget-separator">
      <div class="card-body p-b-20">
        <div class="list-group">
          @foreach($employee as $value)
          <div class="list-group-item media">
            <div class="pull-left">
              <img class="lg-item-img" src="{{ $value->photo }}" alt="" width="75px" height="75px">
            </div>
            <div class="media-body">
              <div class="pull-left">
                <div class="lg-item-heading">{{ $value->ename }}</div>
                <div class="lg-item-heading">{{ $value->designation }}</div>
                <small class="lg-item-text">{{ $value->e_emailid }}</small><br>
                <small class="lg-item-text">{{ $value->mobilenum }}</small>
              </div>
              <div class="pull-right" style="padding-right: 200px">
                <a href="{{ route('employee.view' , ['eid' => $value->eid ]) }}"><button type = "button" class = "btn btn-success"><i class="fa fa-eye"></i> View Profile</button></a>
                <a href="{{ route('employee.edit' , ['eid' => $value->eid ]) }}"><button type = "button" class = "btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                <a onclick="return confirm('Are you sure you want to deactivate the employee?')" href="{{ route('employee.delete' , ['eid' => $value->eid ]) }}"><button type = "button" class = "btn btn-danger"><i class="fa fa-trash-o"></i> Deactivate</button></a>                 
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
