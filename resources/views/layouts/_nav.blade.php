<nav class="sidebar">
  <ul class="nav nav-pills nav-stacked">
    <li {{{ Request::is('stages') ? 'class=active' : '' }}}><a href="{{ route('stages.index') }}">Этапы</a></li>
    <li {{{ Request::is('templates') ? 'class=active' : '' }}}><a href="{{ route('templates.index') }}">Выбор шаблона</a></li>
    <li {{{ Request::is('tasks') ? 'class=active' : '' }}}><a href="{{ route('tasks.index') }}">Вопросы</a></li>
    <li><a href="javascript:void(0)">Настройки</a></li>
  </ul>
</nav>
