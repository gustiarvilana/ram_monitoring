 <!-- sidebar menu: : style can be found in sidebar.less -->
 <ul class="sidebar-menu" data-widget="tree">
    <li>
         <a href="{{ route('dashboard') }}">
             <i class="fa fa-dashboard"></i> <span>dashboard</span>
             <span class="pull-right-container">
             </span>
         </a>
     </li>

     {{-- Superadmin --}}

     @if (Auth::user()->level == '99')
     <li class="header">SUPERADMIN</li>
     @else
     <li class="header">Menu</li>
     @endif
        
        @if (Auth::user()->level == '99')
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-cube"></i> <span> User Management</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route('customer.list') }}">
                <i class="fa fa-list"></i> <span>Customer List</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.index') }}">
                <i class="fa fa-file" aria-hidden="true"></i> <span>Report Customer</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>

     {{-- Superadmin --}}
 </ul>