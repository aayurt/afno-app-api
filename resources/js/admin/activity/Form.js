import AppForm from "../app-components/Form/AppForm";

Vue.component("activity-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                subtitle: this.getLocalizedFormDefaults(),
                body: "",
                link: "",
                fullWidth: false,
                enabled: false,
                textTop: false,
                textDark: false
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
