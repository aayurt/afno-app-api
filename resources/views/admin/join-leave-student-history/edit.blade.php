@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.join-leave-student-history.actions.edit', ['name' => $joinLeaveStudentHistory->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <join-leave-student-history-form
                :action="'{{ $joinLeaveStudentHistory->resource_url }}'"
                :data="{{ $joinLeaveStudentHistory->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.join-leave-student-history.actions.edit', ['name' => $joinLeaveStudentHistory->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.join-leave-student-history.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </join-leave-student-history-form>

        </div>
    
</div>

@endsection