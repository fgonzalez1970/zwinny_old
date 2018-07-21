<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                  <a href="{{ url('home') }}">
                    <i class="fa fa-dashboard"></i>{{ trans('adminlte_lang::message.dashboard') }}
                  </a>
            </li>
            
            <!--<li class="header">Admin</li>-->
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->isRole('admin-zwinny'))
            @can('tenants.index')
                <li class="treeview">
                    <a href="#"><i class='fa fa-users'></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a> 
                    <ul class="treeview-menu">
                        @can('tenants.index') 
                            <li><a href="{{ url('tenants') }}"><span>{{ trans('adminlte_lang::message.tenants') }}</span></a></li>
                        @endcan
                        @can('roles.index')
                            <li><a href="{{ url('roles') }}"><span>{{ trans('adminlte_lang::message.roles') }}</span></a></li>
                        @endcan
                        @can('users.index')
                            <li><a href="{{ url('users') }}"><span>{{ trans('adminlte_lang::message.users') }}</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @endif
            <li class="header">CRM</li>
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->isRole('admin-zwinny'))
                        
            @else
                <li class="treeview">
                    <a href="#"><i class='fa fa-users'></i> <span>{{ trans('adminlte_lang::message.leads') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                    
                        @can('leads.index') 
                            <li><a href="{{ url('leads') }}"><span>{{ trans('adminlte_lang::message.listleads') }}</span></a></li>
                        @endcan
                    
                    </ul>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>