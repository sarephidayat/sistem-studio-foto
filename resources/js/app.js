import './bootstrap';
import flatpickr from 'flatpickr';

flatpickr("#booking_date", {
    inline: true,
    minDate: "today",
    dateFormat: "Y-m-d",
})