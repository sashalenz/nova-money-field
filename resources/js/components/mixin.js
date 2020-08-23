export default {
    computed: {
        formattedValue() {
            if (this.field.value === undefined || this.field.value === null) {
                return '-';
            }
    
            return new Intl.NumberFormat(this.field.locale || 'en-US', {
                style: 'currency',
                currency: this.field.value.currency
            }).format(this.field.value.amount/100);
        },
    }
}
