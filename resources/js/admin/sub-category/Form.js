import AppForm from '../app-components/Form/AppForm';

Vue.component('sub-category-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                sub_title:  this.getLocalizedFormDefaults() ,
                description:  this.getLocalizedFormDefaults() ,
                category_id:  '' ,
                
            }
        }
    }

});