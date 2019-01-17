<!-- User Account Menu -->
<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">{{ $template['realname'] ? $template['realname'] :(Session::get('jhmc_permission')->ugrp_name) }}</span>
  </a>
  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

      <p>
        {{ $template['realname'] }}
      </p>
    </li>

    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="{{url('')}}/logout" class="btn btn-default btn-flat">Sign out</a>
      </div>
    </li>
  </ul>
</li>