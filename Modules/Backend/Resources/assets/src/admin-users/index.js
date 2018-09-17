import { pageList } from './pages/pageList';

export function init(){

    if(typeof g.page_admin_users_list !== 'undefined' && g.page_admin_users_list){
        pageList();
    }
}