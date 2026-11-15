<a class="department-card" href="{{ route('departments.show',$department->slug) }}">
 <span class="icon-tile"><i data-lucide="{{ $department->icon ?: 'activity' }}" style="width:29px;height:29px"></i></span>
 <h3>{{ $department->name }}</h3><p>{{ $department->description }}</p>
 <span class="card-bottom">Explore department <i data-lucide="arrow-up-right" style="width:19px;height:19px"></i></span>
</a>
