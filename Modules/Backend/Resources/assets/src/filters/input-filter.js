import React from 'react';

export default function InputFilter({filter, onChange}){
    return (
        <input style={{width:'100%'}}
               onKeyPress={event => {
                   if (event.keyCode === 13 || event.which === 13) {
                       onChange(event.target.value)
                   }
               }}
        />
    );
}
