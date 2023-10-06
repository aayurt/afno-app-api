import AppForm from '../app-components/Form/AppForm';

Vue.component('activity-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                subtitle:  '' ,
                body:  '' ,
                link:  '' ,
                fullWidth:  false ,
                enabled:  false ,
                
            }
        }
    },
    mediaCollections: ["cover", "gallery", "pdf"]


});