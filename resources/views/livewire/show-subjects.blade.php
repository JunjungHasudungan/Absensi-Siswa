<div>
    <h2 class="text-center">List Mata Pelajaran</h2>
    <ul>
       @foreach ($subjects as $item)
       <li> {{ $item->name }} </li>

       @endforeach

    </ul>
</div>
