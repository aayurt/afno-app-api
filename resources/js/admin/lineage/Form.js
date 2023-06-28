import AppForm from "../app-components/Form/AppForm";

Vue.component("lineage-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                short_description: this.getLocalizedFormDefaults(),
                description: this.getLocalizedFormDefaults(),
                enabled: false
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
