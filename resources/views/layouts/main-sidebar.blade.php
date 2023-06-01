<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('dashboard.dashboard')}}</li>


                    <li>
                        <a href=#" style="padding-bottom:30px;">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <?php
                    $users = \App\Models\User::where('id','!=',auth()->id())->get();
                    ?>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#members">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">Room</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="members" class="collapse" data-parent="#sidebarnav">
                            @foreach($users as $user)
{{--                            <li> <a href="{{route('check_room',['receiver_id'=>$user->id,'sender_id'=>auth()->id()])}}"><i class='fas fa-user'></i>{{$user->name}}</a></li>--}}
                            <li> <a href="{{route('check_room',$user->id)}}"><i class='fas fa-user'></i>{{$user->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#database">
                            <div class="pull-left"><i class="fas fa-database"></i><span class="right-nav-text">data</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="database" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#"><i class='fas fa-flag'></i>fhg</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
