<nav class="sidebar">
  <ul class="nav nav-pills nav-stacked">
    <li {{{ Request::is('stages') ? 'class=active' : '' }}}><a href="{{ route('stages.index') }}">Этапы</a></li>
    <li {{{ Request::is('templates') ? 'class=active' : '' }}}><a href="{{ route('templates.index') }}">Шаблоны</a></li>
    <li {{{ Request::is('tasks') ? 'class=active' : '' }}}><a href="{{ route('tasks.index') }}">Вопросы</a></li>
    <li {{{ Request::is('calculations') ? 'class=active' : '' }}}><a href="{{ route('calculations.index') }}">Расчёт</a></li>
    <li {{{ Request::is('reviews') ? 'class=active' : '' }}}><a href="{{ route('reviews.index') }}">Справочник по отзывам</a></li>
    <li {{{ Request::is('clients') ? 'class=active' : '' }}}><a href="{{ route('clients.index') }}">Справочник по клиентам</a></li>
  </ul>
</nav>
