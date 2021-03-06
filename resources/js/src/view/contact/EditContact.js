import React, { useCallback, useEffect,  useState } from 'react';
import { Link } from 'react-router-dom';

/** Components */
import Form from '../../components/forms/Form';

/** Services */
import API from '../../services/api';

const formObj = {
    email: {
        inputType : 'input',
        type : 'email', 
        label: 'ელ-ფოსტა *',
        name : 'email',
        required: true,
        value : null
    },
    working_hours: {
        inputType : 'input',
        type : 'text',
        label: 'სამუშაო საათები', 
        name : 'working_hours',
        required: false,
        value : null
    },
    contact_info: {
        inputType : 'textarea',
        type : 'text',
        label: 'მისამართი', 
        name : 'contact_info',
        required: false,
        value : null
    },
    phone: {
        inputType : 'input',
        type : 'text',
        label: 'ტელეფონი', 
        name : 'phone',
        required: false,
        value : null
    },
};

const EditContact = ({ match }) => {

    const [ data , setData ] = useState(null);
    

    const fetchData = useCallback(() => {
            
            let lang = match.params.lang ? match.params.lang : 'ge';


            API.get(`${lang}/contacts/${match.params.id}`).then(res => {

                const resData = res.data.data;
                const apiData = { ...formObj };

                if(resData){
                    Object.keys(resData).forEach( item => {
                        if( apiData[item] ){
                            apiData[item].value = resData[item] ? resData[item] : '';
                        }

                    })

                    setData(apiData);
                }

            })
        },
        [ match.params.id , match.params.lang ],
    )

    useEffect(() => {

        fetchData();
    }, [ fetchData ])

    return (
        <div id="wrapper">
            <div id="page-wrapper">
                <div className="row">
                    <div className="col-lg-12 page-title-box">
                        <h4 className="page-title">Create Contact</h4>

                        <div className="page-title-right">  
                            <ol className="breadcrumb m-0">
                                <li className="breadcrumb-item"><Link to="/">Dashboard</Link></li>
                                <li className="breadcrumb-item"><Link to='/contacts'>Contacts</Link></li>
                                <li className="breadcrumb-item active">Create Contact</li>
                            </ol>
                        </div>
                        <br/>
                        <hr/>
                    </div>
                    <div className="container-fluid">
                        { data ? <Form 
                                    formData = { data } 
                                    module = 'contacts' 
                                    method = 'update'  
                                    id = {match.params.id}
                                    lang = {match.params.lang }
                                    
                                    /> : null}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default EditContact;