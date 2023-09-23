@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.member-attendance.actions.edit', ['name' => $memberAttendance->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <member-attendance-form
                :action="'{{ $memberAttendance->resource_url }}'"
                :data="{{ $memberAttendance->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.member-attendance.actions.edit', ['name' => $memberAttendance->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.member-attendance.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </member-attendance-form>

        </div>
    
</div>

@endsection