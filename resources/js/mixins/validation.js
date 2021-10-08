const mixin = {
    methods: {
        validateInput(data) {
            const constraints = {
                first_name: {
                    presence: false,
                    length: {
                      minimum: 2,
                      message: "Cannot be less than 2 letters"
                    },
                },
                last_name: {
                    presence: false,
                    length: {
                      minimum: 2,
                      message: "Cannot be less than 2 letters"
                    },
                },
                email: {
                    presence: false,
                    email: true,
                    length: function (value) {
                        if (value.length === 0) return { is: 1, message: 'is required' };
                    }
                },
                message: {
                    presence: false,
                    format: {
                        pattern: /[A-Za-z\s]{10,}\W*\d*/,
                        flags: "g",
                        message: ": As lengthy as you like"
                    },
                },
                password: {
                    presence: false,
                    format: {
                        pattern: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[\W])[a-zA-Z0-9!@#$%^&*_-]{6,}$/,
                        flags: "g",
                        message: ": Must have mixed case, a number and a symbol. (:;|,~`) is not allowed"
                    },
                }
            };
            return this.validate(data, constraints);
        },
        getError(attribute, data) {
            const errors = this.validate(data)[attribute];
            return (errors.length) ? errors : null;
        }
    }
};

export default mixin;

