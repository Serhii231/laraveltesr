<div>
    <table>
    <tr>
        <td>
          <a href="{{ route('main') }}" >{{ __('menu.navigation.main') }}</a>
        </td>
        <td>
            <a href="{{ route('discography_histories') }}" >{{ __('menu.navigation.discography_histories') }}</a>
        </td>
        <td>
          <a href="{{ route('news') }}">@lang('menu.navigation.news')</a>
        </td>
        <td>  
           <a href="{{ route('about') }}" >@lang('menu.navigation.about')</a>
        </td>
      
        @auth()
        <td>
          <div class="dropdown">
            <button class="dropbtn">{{ auth()->user()->username }}</button>
            <div class="dropdown-content">
              <a href="#">@lang('menu.navigation.Personal_page')</a>
              <a href="#">@lang('menu.navigation.settings')</a>
              <a href="{{ route('exit') }}">@lang('menu.navigation.exit')</a>
            </div>
          </div>
        </td>
        @else
        <td>
            <a href="{{ route('authorization') }}">@lang('menu.navigation.authorization')</a>
        </td>
        <td>
           <a href="{{ route('registration') }}">@lang('menu.navigation.registration')</a>
        </td>
        @endauth
        </table>
</div>
