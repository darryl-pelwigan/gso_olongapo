@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Navigations List
      </h1>
      <h5>Label : </h5>
      <p class="text-red">softdeted menus are red</p>
    </section>

    <!-- Main content -->
<section class="content">
  @for ($i = 0; $i < count($navs['main']); $i++)
     <?php
         if(($i%3)==0){
           echo ' <div class="row">';
         }

      ?>
      <div class="col-md-4">
       <div class="box ">
            <div class="box-header">
             <h3>{{$navs['group'][$i]->ugrp_name}}</h3>
              <input type="hidden" id="group_id[{{$navs['group'][$i]->id}}]" value="{{count($navs['main'][$i])}}" />
             <div class="btn-group">
                      <button type="button" class="btn btn-success" onclick="$(this).addMainMenu('{{$navs['group'][$i]->id}}','{{$navs['group'][$i]->ugrp_name}}')">Add</button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <ul class="menus-menus-menus">

            @foreach($navs['main'][$i] as $nav)

                <?php
                  $deleted = $nav->deleted_at?'text-red':'';
                  $props_main = json_decode($nav->properties,true);
                   foreach ($props_main as $key => $value) {
                    $prop_main[$key] = '';
                      foreach ($props_main[$key] as $keyx => $valuex) {
                              if($keyx=='class'){
                                $prop_main[$key] .= " $keyx=\"$valuex $deleted\" ";
                              }else{
                                $prop_main[$key] .= " $keyx=\"$valuex\" ";
                              }
                      }
                  }
                ?>

              @if($nav->parent==0)
                  <li <?=array_has($prop_main, 'li')?$prop_main['li']:''?>  >
                   <input type="hidden" id="group_id_sub[{{$navs['group'][$i]->id}}][{{$nav->id}}]" value="0" />
                          <a  <?=(array_has($prop_main, 'a')?$prop_main['a']:'')?> href="#"  onclick="$(this).editMainMenu( '{{$nav->id}}' ,  '{{$navs['group'][$i]->id}}' ,  '{{$navs['group'][$i]->ugrp_name}}'   );">
                            <i <?=array_has($prop_main, 'i')?$prop_main['i']:''?> ></i>
                            {{$nav->title}}
                      </a>
                      <button type="button" class="btn btn-info btn-xs" onclick="$(this).childToMainMenu('{{$nav->id}}', '{{$nav->title}}' , '{{$navs['group'][$i]->id}}' , '{{$navs['group'][$i]->ugrp_name}}'  );"><i class="fa fa-plus"></i></button>
                  </li>
              @else
                   <li class="treeview">

                      <a  <?=(array_has($prop_main, 'a')?$prop_main['a']:'')?> href="#" onclick="$(this).editMainMenu('{{$nav->id}}' ,  '{{$navs['group'][$i]->id}}' ,  '{{$navs['group'][$i]->ugrp_name}}');">
                        <i <?=$prop_main['i']?> ></i> <span>{{$nav->title}}</span>
                      </a>
                       <button type="button" class="btn btn-info btn-xs" onclick="$(this).childToMainMenu('{{$nav->id}}', '{{$nav->title}}'  , '{{$navs['group'][$i]->id}}' , '{{$navs['group'][$i]->ugrp_name}}');"><i class="fa fa-plus"></i></button>
                      <ul class="treeview-menu">
                      <?php $count_sub=0;?>
                      @foreach($navs['subs'][$i] as $snav)
                        @if($nav->id==$snav->parent_id)
                         <?php

                            $props_sub = json_decode($snav->properties,true);
                            foreach ($props_sub as $key => $value) {
                              $prop_sub[$key] = '';
                              foreach ($props_sub[$key] as $keyx => $valuex) {
                                $prop_sub[$key] .= " $keyx=\"$valuex\"";
                              }
                            }
                            $count_sub++;
                          ?>

                          <li <?=array_has($prop_sub, 'li')?$prop_sub['li']:''?> >

                                      <a href="#" <?=array_has($prop_sub, 'a')?$prop_sub['a']:''?> onclick="$(this).editChildMainMenu('{{$snav->id}}','{{$nav->id}}' ,  '{{$navs['group'][$i]->id}}' ,  '{{$navs['group'][$i]->ugrp_name}}');">
                                      <i <?=array_has($prop_sub, 'i')?$prop_sub['i']:''?> ></i>
                                      {{$snav->title}}
                              </a>
                          </li>
                        @endif
                      @endforeach
                      </ul>
                      <input type="hidden" id="group_id_sub[{{$navs['group'][$i]->id}}][{{$nav->id}}]" value="{{$count_sub}}" />
                  </li>
              @endif
            @endforeach

             </ul>
         </div>
            <!-- /.box-body -->
      </div>
          <!-- /.box -->
    </div>
      <?php
         if($i>1 && ($i%3)==2){
            echo '</div>';
         }

      ?>
  @endfor

<!-- Modal -->
<div class="modal fade" id="update_main_menus_modal" tabindex="-1" role="dialog" aria-labelledby="update_main_menus_modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="update_main_menus_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu"></div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



   @stop

@section('plugins-css')

@stop



@section('plugins-script')

<script type="text/javascript">

$.fn.editMainMenu = function(id,ugrp_id,ugrp_name){

      $.ajax({
                  type: "POST",
                  url: "{{route('admin.get_main_menus_info')}}",
                  data : {
                          main_menu : id,
                          _token: "{{csrf_token()}}"

                                },
                                dataType: "json",
                                error: function(){
                                    alert('error');
                                },
                                success: function(data){
                                  var properties =  data['main_nav'].properties;
                                  var props = {};
                                  var count = 0;
                                  for(var key in properties){
                                    props[key] = '';
                                      for(var keyx in properties[key]){
                                             props[key] += '     <div class="form-group"> <label for="prop['+key+']['+keyx+']" class="col-sm-3 control-label" >'+keyx+'</label>   <div class="col-sm-9"> <input type="email" class="form-control" name="prop['+key+']['+keyx+']" id="prop['+key+']['+keyx+']" placeholder="" value="'+properties[key][keyx]+'"></div></div>';
                                      }
                                  }


                                  var group_options = '<option value="'+data['group'].id+'"> '+data['group'].ugrp_name+'</option>';
                                  for (var i = 0; i<data['group_all'].length ; i++) {
                                      if(data['group'].id != data['group_all'][i].id ){
                                          group_options = group_options + '<option value="'+data['group_all'][i].id+'"> '+data['group_all'][i].ugrp_name+'</option>';
                                      }
                                  }
                                  var arrangement_options = '<option value="'+data['main_nav'].arangement+'"> '+data['main_nav'].arangement+'</option>';
                                  for (var i = 0; i<data['per_group'].length ; i++) {
                                      if(data['main_nav'].arangement != data['per_group'][i].arangement ){
                                          arrangement_options = arrangement_options + '<option value="'+data['per_group'][i].arangement+'"> '+data['per_group'][i].arangement+'</option>';
                                      }
                                  }

                                  var parent_yes = ((data['main_nav'].parent)==0)?'':'checked="true"';
                                  var parent_no = ((data['main_nav'].parent)==0)?'checked="true"':'';

                                  var deleted_at_yes = (data['main_nav'].deleted_at)?'checked="true"':'';
                                  var deleted_at_no = (data['main_nav'].deleted_at===null)?'checked="true"':'';

                                  var softdeleted = '    <div class="form-group">'+
                                                    '      <label for="menu_delete" class="col-sm-3 control-label">Delete</label>'+
                                                    '      <div class="col-sm-9">'+
                                                    '       <div class="radio">'+
                                                    '        <label>'+
                                                    '          <input type="radio" name="menu_delete" id="menu_delete" '+deleted_at_yes+' value="1"  />'+
                                                    '          YES'+
                                                    '        </label>'+
                                                    '      </div>'+
                                                    '      <div class="radio">'+
                                                    '        <label>'+
                                                    '          <input type="radio" name="menu_delete" id="menu_delete" '+deleted_at_no+' value="0"  />'+
                                                    '          NO'+
                                                    '        </label>'+
                                                    '       </div>'+
                                                     '      <div class="radio">'+
                                                    '        <label>'+
                                                    '          <input type="radio" name="menu_delete" id="menu_delete" value="3"  />'+
                                                    '          Restore'+
                                                    '        </label>'+
                                                    '       </div>'+
                                                    '      </div>'+
                                                    '     </div>';

                                  var parent = '    <div class="form-group">'+
                                                    '      <label for="menu_parent" class="col-sm-3 control-label">Parent</label>'+
                                                    '      <div class="col-sm-9">'+
                                                    '       <div class="radio">'+
                                                    '        <label>'+
                                                    '          <input type="radio" name="menu_parent" id="menu_parent" value="1" '+parent_yes+' data-bv-field="parent">'+
                                                    '          YES'+
                                                    '        </label>'+
                                                    '      </div>'+
                                                    '      <div class="radio">'+
                                                    '        <label>'+
                                                    '          <input type="radio" name="menu_parent" id="menu_parent" value="0" '+parent_no+'  data-bv-field="parent">'+
                                                    '          NO'+
                                                    '        </label>'+
                                                    '       </div>'+
                                                    '      </div>'+
                                                    '     </div>';

                                  var content =   '<form class="form-horizontal" id="update_navigations_main" >'+
                                                  '   {{csrf_field()}}'+
                                                  '   <input type="hidden" value="'+id+'" name="menu_id" id="menu_id" /> '+
                                                  '   <input type="hidden" value="'+data['group'].id+'" name="menu_group_id" id="menu_group_id" /> '+
                                                  '  <div class="box-body">'+
                                                  '    <div class="form-group">'+
                                                  '      <label for="menu_title" class="col-sm-3 control-label">Title</label>'+
                                                  '      <div class="col-sm-9">'+
                                                  '        <input type="email" class="form-control" name="menu_title" id="menu_title" placeholder="" value="'+data['main_nav'].title+'">'+
                                                  '      </div>'+
                                                  '    </div>'+
                                                  '    <div class="form-group">'+
                                                  '      <label for="menu_route" class="col-sm-3 control-label">Route</label>'+
                                                  '      <div class="col-sm-9">'+
                                                  '        <input type="text" class="form-control" name="menu_route" id="menu_route" placeholder="Route" value="'+data['main_nav'].route+'" >'+
                                                  '      </div>'+
                                                  '    </div>'+
                                                          ((id!=1)?parent:'')+
                                                  '      <div class="form-group">'+
                                                  '       <label  for="menu_parent" class="col-sm-3 control-label" >User Group</label>'+
                                                  '       <div class="col-sm-9">'+
                                                  '          <select class="form-control" id="menu_group" name="menu_group">'+
                                                                 ((id!=1)?group_options:'')+
                                                  '          </select>'+
                                                  '      </div>'+
                                                  '      </div>'+
                                                  '      <div class="form-group">'+
                                                  '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Arrangement</label>'+
                                                  '       <div class="col-sm-9">'+
                                                  '          <select class="form-control" id="menu_arrangement" name="menu_arrangement">'+
                                                                 arrangement_options+
                                                  '          </select>'+
                                                  '      </div>'+
                                                  '      </div>'+
                                                  '      <div class="form-group">'+
                                                  '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Properties</label>'+
                                                  '       <div class="col-sm-9">'+
                                                  '       <h4>element : li <button type="button" class="btn btn-success btn-xs " onclick="$(this).addLiProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                                                  '       <div id="li_props"> '+((props['li']===undefined)?'':props['li'])+'</div>'+
                                                  '                      <hr />'+
                                                  '       <h4>element : a <button type="button" class="btn btn-success btn-xs " onclick="$(this).addAProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                                                  '       <div id="a_props"> '+((props['a']===undefined)?'':props['a'])+'</div>'+
                                                  '                      <hr />'+
                                                  '       <h4>element : i <button type="button" class="btn btn-success btn-xs " onclick="$(this).addIProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                                                  '       <div id="i_props"> '+((props['i']===undefined)?'':props['i'])+'</div>'+
                                                  '      </div>'+
                                                  '      </div>'+
                                                        ((id!=1)?softdeleted:'')+
                                                  '  </div>'+
                                                  '</form>';
                                    var modal_footer = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                                                        '<button type="button" class="btn btn-primary" onclick="$(this).submitEditMainNavs();" >Save changes</button>';

                                    $('#update_main_menus_modalLabel span').text('Update Main menus for '+data['group'].ugrp_name);
                                    $('#update_main_menus_modal .modal-body #contents-menu').html(content);
                                    $('#update_main_menus_modal .modal-footer').html(modal_footer);
                                    $('#update_main_menus_modal').modal('show');
                                }
                    });

};

$.fn.addMainMenu = function(id,ugrp_name){
  var menus_count = parseInt($('input[id="group_id['+id+']"').val());
   var arrangement_options = '<option></option>';
    for (var i = 1; i<=(menus_count+1) ; i++) {
      if((menus_count+1)===i){
        arrangement_options = arrangement_options + '<option value="'+i+'" selected >'+i+'</option>';
      }else{
        arrangement_options = arrangement_options + '<option value="'+i+'" >'+i+'</option>';
      }


    }
    var content = '<form class="form-horizontal" id="add_navigations_main" method="POST" >'+
                    '   {{csrf_field()}}'+
                    '   <input type="hidden" value="'+id+'" name="menu_group_id" id="menu_group_id" /> '+
                    '  <div class="box-body">'+
                    '    <div class="form-group">'+
                    '      <label for="menu_title" class="col-sm-3 control-label">Title</label>'+
                    '      <div class="col-sm-9">'+
                    '        <input type="email" class="form-control" name="menu_title" id="menu_title" placeholder="Title" value="" required />'+
                    '      </div>'+
                    '    </div>'+
                    '    <div class="form-group">'+
                    '      <label for="menu_route" class="col-sm-3 control-label">Route</label>'+
                    '      <div class="col-sm-9">'+
                    '        <input type="text" class="form-control" name="menu_route" id="menu_route" placeholder="Route" value="" required />'+
                    '      </div>'+
                    '    </div>'+
                    '    <div class="form-group">'+
                    '      <label for="menu_parent" class="col-sm-3 control-label">Parent</label>'+
                    '      <div class="col-sm-9">'+
                    '       <div class="radio">'+
                    '        <label>'+
                    '          <input type="radio" name="menu_parent" id="menu_parent" value="1" data-bv-field="parent" checked="true">'+
                    '          YES'+
                    '        </label>'+
                    '      </div>'+
                    '      <div class="radio">'+
                    '        <label>'+
                    '          <input type="radio" name="menu_parent" id="menu_parent" value="0" data-bv-field="parent" checked="true" >'+
                    '          NO'+
                    '        </label>'+
                    '       </div>'+
                    '      </div>'+
                    '     </div>'+
                    '      <div class="form-group">'+
                    '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Arrangement</label>'+
                    '       <div class="col-sm-9">'+
                    '          <select class="form-control" id="menu_arrangement" name="menu_arrangement">'+
                                arrangement_options+
                    '          </select>'+
                    '      </div>'+
                    '      </div>'+
                    '      <div class="form-group">'+
                    '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Properties</label>'+
                    '       <div class="col-sm-9">'+
                    '       <h4>element : li <button type="button" class="btn btn-success btn-xs " onclick="$(this).addLiProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="li_props"> </div>'+
                    '                      <hr />'+
                    '       <h4>element : a <button type="button" class="btn btn-success btn-xs " onclick="$(this).addAProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="a_props"> </div>'+
                    '                      <hr />'+
                    '       <h4>element : i <button type="button" class="btn btn-success btn-xs " onclick="$(this).addIProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="i_props"> </div>'+
                    '      </div>'+
                    '      </div>'+
                    '  </div>'+
                    '</form>';
      var modal_footer = '<div class="form-group"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                          '<button type="button" class="btn btn-primary" onclick="$(this).submitAddMainNavs();"  >Save changes</button></div>';

      $('#update_main_menus_modalLabel span').text('Add Main menus for '+ugrp_name);
      $('#update_main_menus_modal .modal-body #contents-menu').html(content);
      $('#update_main_menus_modal .modal-footer').html(modal_footer);
      $('#update_main_menus_modal').modal('show');
};

$.fn.childToMainMenu = function( id, nav_title,ugrp_id, ugrp_name){
   var menus_count = parseInt($('input[id="group_id_sub['+ugrp_id+']['+id+']"').val());
   var arrangement_options = '<option></option>';
   console.log(menus_count);
    for (var i = 1; i<=(menus_count+1) ; i++) {
      if((menus_count+1)===i){
        arrangement_options = arrangement_options + '<option value="'+i+'" selected >'+i+'</option>';
      }else{
        arrangement_options = arrangement_options + '<option value="'+i+'" >'+i+'</option>';
      }
    }
    var content = '<form class="form-horizontal" id="add_child_navigations_main" method="POST" >'+
                    '   {{csrf_field()}}'+
                    '   <input type="hidden" value="'+id+'" name="menu_parent_id" id="menu_parent_id" /> '+
                    '   <input type="hidden" value="'+ugrp_id+'" name="menu_group_id" id="menu_group_id" /> '+
                    '  <div class="box-body">'+
                    '    <div class="form-group">'+
                    '      <label for="menu_title" class="col-sm-3 control-label">Title</label>'+
                    '      <div class="col-sm-9">'+
                    '        <input type="email" class="form-control" name="menu_title" id="menu_title" placeholder="Title" value="" required />'+
                    '      </div>'+
                    '    </div>'+
                    '    <div class="form-group">'+
                    '      <label for="menu_route" class="col-sm-3 control-label">Route</label>'+
                    '      <div class="col-sm-9">'+
                    '        <input type="text" class="form-control" name="menu_route" id="menu_route" placeholder="Route" value="" required />'+
                    '      </div>'+
                    '    </div>'+
                    '      <div class="form-group">'+
                    '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Arrangement</label>'+
                    '       <div class="col-sm-9">'+
                    '          <select class="form-control" id="menu_arrangement" name="menu_arrangement">'+
                                arrangement_options+
                    '          </select>'+
                    '      </div>'+
                    '      </div>'+
                    '      <div class="form-group">'+
                    '       <label  for="menu_arrangement" class="col-sm-3 control-label" >Properties</label>'+
                    '       <div class="col-sm-9">'+
                    '       <h4>element : li <button type="button" class="btn btn-success btn-xs " onclick="$(this).addLiProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="li_props"> </div>'+
                    '                      <hr />'+
                    '       <h4>element : a <button type="button" class="btn btn-success btn-xs " onclick="$(this).addAProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="a_props"> </div>'+
                    '                      <hr />'+
                    '       <h4>element : i <button type="button" class="btn btn-success btn-xs " onclick="$(this).addIProps();" ><i class="fa fa-plus" id=""></i></button> </h4>'+
                    '       <div id="i_props"> </div>'+
                    '      </div>'+
                    '      </div>'+
                    '  </div>'+
                    '</form>';
      var modal_footer = '<div class="form-group"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                          '<button type="button" class="btn btn-primary" onclick="$(this).submitAddChildMainNavs();"  >Save changes</button></div>';
   $('#update_main_menus_modalLabel span').text('Add child menus for '+nav_title);
      $('#update_main_menus_modal .modal-body #contents-menu').html(content);
      $('#update_main_menus_modal .modal-footer').html(modal_footer);
      $('#update_main_menus_modal').modal('show');
};

$.fn.editChildMainMenu =function(){

};

$.fn.addLiProps = function(){
  var li_count = $('input[name="prop[lix][]"]').length;
   if(parseInt(li_count)<=5){
          var input_li = '<div class="form-group"> <label for="" class="col-sm-3 control-label" >li:</label>'+
                         '<div class="col-sm-9"> <div class="col-sm-5"><input type="text" name="prop[lix][]" id="prop[lix]['+li_count+']" onblur="$(this).xType(\'li\',\''+li_count+'\');" class="form-control"></div> '+
                         '    <div class="col-sm-7"><input type="email" class="form-control"  id="props[li]['+li_count+']" placeholder="" value=""></div>'+
                         '</div></div>';
                         $('div#li_props').append(input_li);
        }
};


$.fn.addAProps = function(){
  var a_count = $('input[name="prop[ax][]"]').length;
    if(parseInt(a_count)<=5){
        var input_a = '<div class="form-group"> <label for="" class="col-sm-3 control-label" >a:</label>'+
                       '<div class="col-sm-9"> <div class="col-sm-5"><input type="text" name="prop[ax][]" id="prop[ax]['+a_count+']" onblur="$(this).xType(\'a\',\''+a_count+'\');" class="form-control"></div> '+
                       '    <div class="col-sm-7"><input type="email" class="form-control"  id="props[a]['+a_count+']" placeholder="" value=""></div>'+
                       '</div></div>';
                       $('div#a_props').append(input_a);
    }
};

$.fn.addIProps = function(){
  var i_count = $('input[name="prop[ix][]"]').length;
  if(parseInt(i_count)<=5){
    var input_i = '<div class="form-group"> <label for="" class="col-sm-3 control-label" >i:</label>'+
                   '<div class="col-sm-9"> <div class="col-sm-5"><input type="text" name="prop[ix][]" id="prop[ix]['+i_count+']" onblur="$(this).xType(\'i\',\''+i_count+'\');" class="form-control"></div> '+
                   '    <div class="col-sm-7"><input type="email" class="form-control"  id="props[i]['+i_count+']" placeholder="" value=""></div>'+
                   '</div></div>';
                   $('div#i_props').append(input_i);
  }
};

$.fn.xType =function(typex,id){
    var el = this;
    var el2 = $('input[id="props['+typex+']['+id+']"]');
    var new_name = 'props['+typex+']['+el.val()+']';
    el2.attr('name',new_name);
};


/**
 * /
 * function to update main menu
 */
$.fn.submitEditMainNavs = function(){
    $.ajax({
            type: "POST",
            url: "{{route('admin.check_main_menus_info')}}",
            data : $('#update_navigations_main').serialize(),
            dataType: "html",
            error: function(){
                alert('error');
            },
            success: function(data){
              var errors = '';
              if(data['status']==0){
                 for(var key in data['errors']){
                     errors += data['errors'][key]+'<br />';
                  }
                $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(1500).fadeOut(100);
              }else{
                $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(1500).fadeOut(100);
               location.reload();
              }
            }
        });

};

$.fn.submitAddMainNavs = function(){
      $.ajax({
                  type: "POST",
                  url: "{{route('admin.add_main_menus')}}",
                  data : $('#add_navigations_main').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(3500).fadeOut(100);
                    }else{
                      $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(1500).fadeOut(100);
                     location.reload();
                    }
                  }
            });
};

$.fn.submitAddChildMainNavs = function(){
      $.ajax({
            type: "POST",
            url: "{{route('admin.add_child_navigations_main')}}",
            data : $('#add_child_navigations_main').serialize(),
            dataType: "html",
            error: function(){
                alert('error');
            },
            success: function(data){
              var errors = '';
              if(data['status']==0){
                 for(var key in data['errors']){
                     errors += data['errors'][key]+'<br />';
                  }
                $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(1500).fadeOut(100);
              }else{
                $('#update_main_menus_modal .modal-body  #status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(1500).fadeOut(100);
              location.reload();
              }
            }
        });
};
</script>
@stop
