
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.restaurant.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sub_title'), 'has-success': fields.sub_title && fields.sub_title.valid }">
    <label for="sub_title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.sub_title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.sub_title" v-validate="''" id="sub_title" name="sub_title"></textarea>
        </div>
        <div v-if="errors.has('sub_title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sub_title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('location'), 'has-success': fields.location && fields.location.valid }">
    <label for="location" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.location') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.location" v-validate="''" id="location" name="location"></textarea>
        </div>
        <div v-if="errors.has('location')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('location') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone_number'), 'has-success': fields.phone_number && fields.phone_number.valid }">
    <label for="phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone_number" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone_number'), 'form-control-success': fields.phone_number && fields.phone_number.valid}" id="phone_number" name="phone_number" placeholder="{{ trans('admin.restaurant.columns.phone_number') }}">
        <div v-if="errors.has('phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('alternate_phone_number'), 'has-success': fields.alternate_phone_number && fields.alternate_phone_number.valid }">
    <label for="alternate_phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.alternate_phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.alternate_phone_number" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('alternate_phone_number'), 'form-control-success': fields.alternate_phone_number && fields.alternate_phone_number.valid}" id="alternate_phone_number" name="alternate_phone_number" placeholder="{{ trans('admin.restaurant.columns.alternate_phone_number') }}">
        <div v-if="errors.has('alternate_phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('alternate_phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link'), 'has-success': fields.link && fields.link.valid }">
    <label for="link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.link') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link'), 'form-control-success': fields.link && fields.link.valid}" id="link" name="link" placeholder="{{ trans('admin.restaurant.columns.link') }}">
        <div v-if="errors.has('link')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.restaurant.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('youtube'), 'has-success': fields.youtube && fields.youtube.valid }">
    <label for="youtube" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.youtube') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input  type="text" v-model="form.youtube" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('youtube'), 'form-control-success': fields.youtube && fields.youtube.valid}" id="youtube" name="youtube" placeholder="{{ trans('admin.restaurant.columns.youtube') }}">
        <div v-if="errors.has('youtube')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('youtube') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facebook'), 'has-success': fields.facebook && fields.facebook.valid }">
    <label for="facebook" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.facebook') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facebook" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facebook'), 'form-control-success': fields.facebook && fields.facebook.valid}" id="facebook" name="facebook" placeholder="{{ trans('admin.restaurant.columns.facebook') }}">
        <div v-if="errors.has('facebook')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('facebook') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('instagram'), 'has-success': fields.instagram && fields.instagram.valid }">
    <label for="instagram" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.instagram') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.instagram" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('instagram'), 'form-control-success': fields.instagram && fields.instagram.valid}" id="instagram" name="instagram" placeholder="{{ trans('admin.restaurant.columns.instagram') }}">
        <div v-if="errors.has('instagram')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('instagram') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.restaurant.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('longitude'), 'has-success': fields.longitude && fields.longitude.valid }">
    <label for="longitude" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.longitude') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input disabled type="text" v-model="form.longitude" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('longitude'), 'form-control-success': fields.longitude && fields.longitude.valid}" id="longitude" name="longitude" placeholder="{{ trans('admin.restaurant.columns.longitude') }}">
        <div v-if="errors.has('longitude')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('longitude') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('latitude'), 'has-success': fields.latitude && fields.latitude.valid }">
    <label for="latitude" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.latitude') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input disabled type="text" v-model="form.latitude" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('latitude'), 'form-control-success': fields.latitude && fields.latitude.valid}" id="latitude" name="latitude" placeholder="{{ trans('admin.restaurant.columns.latitude') }}">
        <div v-if="errors.has('latitude')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('latitude') }}</div>
    </div>
</div>

<div class="container">
        <div class="row">
            <div class="col-md-12">
            <input
      id="pac-input"
      class="controls"
      type="text"
      placeholder="Search Box"
    />
                <div id="map" style="height: 300px;"></div>
            </div>
        </div>
    </div>

<!-- MONDAY  -->


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monday_open_time'), 'has-success': fields.monday_open_time && fields.monday_open_time.valid }">
    <label for="monday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.monday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.monday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('monday_open_time'), 'form-control-success': fields.monday_open_time && fields.monday_open_time.valid}" id="monday_open_time" name="monday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('monday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monday_open_time') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monday_close_time'), 'has-success': fields.monday_close_time && fields.monday_close_time.valid }">
    <label for="monday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.monday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.monday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('monday_close_time'), 'form-control-success': fields.monday_close_time && fields.monday_close_time.valid}" id="monday_close_time" name="monday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('monday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monday_close_time') }}</div>
    </div>
</div>
<!-- TUESDAY  -->


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tuesday_open_time'), 'has-success': fields.tuesday_open_time && fields.tuesday_open_time.valid }">
    <label for="tuesday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.tuesday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.tuesday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('tuesday_open_time'), 'form-control-success': fields.tuesday_open_time && fields.tuesday_open_time.valid}" id="tuesday_open_time" name="tuesday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('tuesday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tuesday_open_time') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tuesday_close_time'), 'has-success': fields.tuesday_close_time && fields.tuesday_close_time.valid }">
    <label for="tuesday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.tuesday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.tuesday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('tuesday_close_time'), 'form-control-success': fields.tuesday_close_time && fields.tuesday_close_time.valid}" id="tuesday_close_time" name="tuesday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('tuesday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tuesday_close_time') }}</div>
    </div>
</div>

<!-- WEDNESDAY  -->


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wednesday_open_time'), 'has-success': fields.wednesday_open_time && fields.wednesday_open_time.valid }">
    <label for="wednesday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.wednesday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.wednesday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('wednesday_open_time'), 'form-control-success': fields.wednesday_open_time && fields.wednesday_open_time.valid}" id="wednesday_open_time" name="wednesday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('wednesday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wednesday_open_time') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wednesday_close_time'), 'has-success': fields.wednesday_close_time && fields.wednesday_close_time.valid }">
    <label for="wednesday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.wednesday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.wednesday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('wednesday_close_time'), 'form-control-success': fields.wednesday_close_time && fields.wednesday_close_time.valid}" id="wednesday_close_time" name="wednesday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('wednesday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wednesday_close_time') }}</div>
    </div>
</div>

<!-- THURSDAY  -->


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('thursday_open_time'), 'has-success': fields.thursday_open_time && fields.thursday_open_time.valid }">
    <label for="thursday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.thursday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.thursday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('thursday_open_time'), 'form-control-success': fields.thursday_open_time && fields.thursday_open_time.valid}" id="thursday_open_time" name="thursday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('thursday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('thursday_open_time') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('thursday_close_time'), 'has-success': fields.thursday_close_time && fields.thursday_close_time.valid }">
    <label for="thursday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.thursday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.thursday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('thursday_close_time'), 'form-control-success': fields.thursday_close_time && fields.thursday_close_time.valid}" id="thursday_close_time" name="thursday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('thursday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('thursday_close_time') }}</div>
    </div>
</div>

<!-- FRIDAY  -->


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('friday_open_time'), 'has-success': fields.friday_open_time && fields.friday_open_time.valid }">
    <label for="friday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.friday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.friday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('friday_open_time'), 'form-control-success': fields.friday_open_time && fields.friday_open_time.valid}" id="friday_open_time" name="friday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('friday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('friday_open_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('friday_close_time'), 'has-success': fields.friday_close_time && fields.friday_close_time.valid }">
    <label for="friday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.friday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.friday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('friday_close_time'), 'form-control-success': fields.friday_close_time && fields.friday_close_time.valid}" id="friday_close_time" name="friday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('friday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('friday_close_time') }}</div>
    </div>
</div>

<!-- SATURDAY  -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('saturday_open_time'), 'has-success': fields.saturday_open_time && fields.saturday_open_time.valid }">
    <label for="saturday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.saturday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.saturday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('saturday_open_time'), 'form-control-success': fields.saturday_open_time && fields.saturday_open_time.valid}" id="saturday_open_time" name="saturday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('saturday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('saturday_open_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('saturday_close_time'), 'has-success': fields.saturday_close_time && fields.saturday_close_time.valid }">
    <label for="saturday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.saturday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.saturday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('saturday_close_time'), 'form-control-success': fields.saturday_close_time && fields.saturday_close_time.valid}" id="saturday_close_time" name="saturday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('saturday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('saturday_close_time') }}</div>
    </div>
</div>


<!-- SUNDAY  -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sunday_open_time'), 'has-success': fields.sunday_open_time && fields.sunday_open_time.valid }">
    <label for="sunday_open_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.sunday_open_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.sunday_open_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('sunday_open_time'), 'form-control-success': fields.sunday_open_time && fields.sunday_open_time.valid}" id="sunday_open_time" name="sunday_open_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('sunday_open_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sunday_open_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sunday_close_time'), 'has-success': fields.sunday_close_time && fields.sunday_close_time.valid }">
    <label for="sunday_close_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.restaurant.columns.sunday_close_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.sunday_close_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('sunday_close_time'), 'form-control-success': fields.sunday_close_time && fields.sunday_close_time.valid}" id="sunday_close_time" name="sunday_close_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('sunday_close_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sunday_close_time') }}</div>
    </div>
</div>



