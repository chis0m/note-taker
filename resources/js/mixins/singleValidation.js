const mixin = {
    methods: {
        validateFirstName(first_name) {
            const constraints = {
                first_name: {
                    presence: true,
                    length: {
                      minimum: 2,
                      message: "Cannot be less than 2 letters"
                    },
                },
            };
            return this.validate({ first_name }, constraints);
        },
        validateLastName(last_name) {
            const constraints = {
                last_name: {
                    presence: true,
                    length: {
                      minimum: 2,
                      message: "Cannot be less than 2 letters"
                    },
                },
            };
            return this.validate({ last_name }, constraints);
        },
        validateEmail(email) {
            const constraints = {
                email: {
                    presence: true,
                    email: true,
                    length: function (value) {
                        if (value.length === 0) return { is: 1, message: 'is required' };
                    }
                },
            }
            return this.validate({email}, constraints);
        },
        validateMessage(message) {
            const constraints = {
                message: {
                    presence: true,
                    format: {
                        pattern: /[A-Za-z\s]{10,}\W*\d*/,
                        flags: "ig",
                        message: ": As lengthy as you like"
                    },
                },
            };
            return this.validate({ message }, constraints);
        },
        validatePassword(password) {
            const constraints = {
                password: {
                    presence: true,
                    format: {
                        pattern: /^(?=.*[0-9])(?=.*[A-Z])(?=.*[\W])[a-zA-Z0-9!@#$%^&*_-]{6,}$/,
                        flags: "g",
                        message: ": Must have mixed case, a number and a symbol. (:;|,~`) is not allowed"
                    },
                },
            };
            return this.validate({ password }, constraints);
        },
    }

};

export default mixin;
