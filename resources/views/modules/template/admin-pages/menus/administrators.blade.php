@extends('template::admin-layouts.default')

@section('left-sidebar-menu')
<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
   <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        @foreach($template['navs']['main'] as $nav)
            <?php
              $props_main = json_decode($nav->properties,true);

                   foreach ($props_main as $key => $value) {
                    $prop_main[$key] = '';
                            foreach ($props_main[$key] as $keyx => $valuex) {
                                $prop_main[$key] .= " $keyx=\"$valuex\" ";
                      }
                  }
            ?>
          @if($nav->parent==0)
              <li <?=array_has($prop_main, 'li')?$prop_main['li']:''?> >
                    <a href="{{Route::has($nav->route)? route($nav->route) : 'error'}}" <?=array_has($prop_main, 'a')?$prop_main['a']:''?> >
                           <i <?=array_has($prop_main, 'i')?$prop_main['i']:''?> ></i>
                       <span>{{$nav->title}}</span>
                    </a>
              </li>
          @else
               <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{$nav->title}}</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  @foreach($template['navs']['subs'] as $snav)
                  <?php
                    $props_sub = json_decode($snav->properties,true);

                            foreach ($props_sub as $key => $value) {
                              $prop_sub[$key] = '';
                              foreach ($props_sub[$key] as $keyx => $valuex) {
                                $prop_sub[$key] .= " $keyx=\"$valuex\"";
                              }
                            }
                  ?>
                    @if($nav->id==$snav->parent_id)
                      <li <?=array_has($prop_sub, 'li')?$prop_sub['li']:''?> >
                            <a href="{{Route::has($snav->route)? route($snav->route) : 'error'}}" <?=array_has($prop_sub, 'a')?$prop_sub['a']:''?> >
                                <i <?=array_has($prop_sub, 'i')?$prop_sub['i']:''?> ></i>
                                 <span>{{$snav->title}}</span>
                            </a>
                      </li>
                    @endif
                  @endforeach
                  </ul>
              </li>
          @endif
        @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@stop
