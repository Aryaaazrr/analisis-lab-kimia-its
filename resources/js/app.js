require('./bootstrap');
import('flowbite');
import 'flowbite-datepicker';
// import Datepicker from 'flowbite-datepicker/Datepicker';
import { Modal } from 'flowbite';

/*
* $targetEl: required
* options: optional
*/
const modal = new Modal($targetEl, options);

import { Tabs } from 'flowbite';

/*
* tabElements: array of tab objects
* options: optional
*/
const tabs = new Tabs(tabElements, options);

// options with default values
const options = {
    defaultTabId: 'settings',
    activeClasses: 'text-green-600 hover:text-green-600 border-blue-600',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300',
    onShow: () => {
        console.log('tab is shown');
    }
};