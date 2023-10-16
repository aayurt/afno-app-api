import AppForm from "../app-components/Form/AppForm";

Vue.component("sub-activity-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activity_id: "",
                title: this.getLocalizedFormDefaults(),
                subtitle: this.getLocalizedFormDefaults(),
                body: this.getLocalizedFormDefaults(),
                link: "",
                fullWidth: false,
                enabled: true,
                textTop: true,
                textDark: true
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
