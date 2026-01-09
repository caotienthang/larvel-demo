import './bootstrap';
import '../css/navigation.css'
import '../css/home.css'
import '../css/footer.css'
import '../css/service/services.css'
import '../css/service/service-detail.css'
import '../css/user/profile.css'
import './user/profile.js'
import './service/service-detail.js'
import './home.js'
import '../css/about.css';
import '../css/contact.css';
import '../css/faqs.css';
import '../css/pages/policy.css';
import '../css/pages/shipping-policy.css';
import '../css/pages/return-refund-policy.css';
import '../css/pages/privacy-policy.css';
import '../css/pages/intellectual-property-policy.css';
import '../css/pages/subscription-policy.css';
import '../css/pages/terms.css';
import "../css/checkout/checkout.css";
import "../css/order/order-show.css";
import "../css/product/product-show.css";


import initPromoSlider from './home.js';

document.addEventListener('DOMContentLoaded', () => {
  initPromoSlider();
});


