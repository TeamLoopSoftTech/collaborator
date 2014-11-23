
<style>
.thumb{
    height:100%;
}
</style>

<div class="navbar navbar-default navbar-static-top" role="navigation" id="sticky_navigation">
    <div class="container" id="nav">
        <div class="navbar-header">
            <a href="{{URL::route('home')}}" class="navbar-brand">{{ HTML::image('asset/images/philgeps_banner.jpg', 'a picture', array('class' => 'thumb')) }}</a>
            <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navHeaderCollapse">

                    <ul class="nav navbar-nav navbar-right">
						
                        <li><a href="{{URL::route('home')}}">My Account</a></li>
                        <li><a href="{{URL::route('bid-item',1)}}">Bid Items</a></li>
                        <li><a href="{{URL::route('sms-alert')}}">SMS Alert</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Social Media <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.facebook.com/groups/kabantayprocurement/" target="_blank"><i class="fa fa-facebook circle icon"></i><span>facebook</span></a></li>
                                    <li><a href="#"><i class="fa fa-twitter circle icon"></i><span>twitter</span></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus circle icon"></i><span>google plus</span></a></li>
                                 </ul>
                        </li>
                    </ul>

        </div>

    </div>


</div>