import React, { useCallback, useEffect,  useState } from 'react';

/** Components */
import Form from '../../components/forms/Form';

/** Services */
import API from '../../services/api';


const formObj = {
    first_name: {
        inputType : 'input',
        type : 'text', 
        label: 'სახელი',
        name : 'first_name', 
        required: false,
        value : null
    },
    last_name: {
        inputType : 'input',
        type : 'text', 
        label: 'გვარი',
        name : 'last_name',
        required: false,
        value : null
    },
    company: {
        inputType : 'input',
        type : 'text', 
        label: 'კომპანია',
        name : 'company',
        required: false,
        value : null
    },
    position: {
        inputType : 'input',
        type : 'text', 
        label: 'პოზიცია',
        name : 'position',
        required: false,
        value : null
    },
    description: {
        inputType : 'CKEditor',
        type : 'text',
        label: 'აღწერა',
        name : 'description',
        required: false,
        value : null
    },
    status: {
        inputType : 'select',
        label: 'სტატუსი',
        name : 'status',
        required: true,
        value : 1,
            options : [
                {
                    id:1,
                    title:'active'
                },
                {
                    id:0,
                    title:'inactive'
                },
            ]
    },
    file: {
        inputType : 'file',
        type : 'file',
        label: 'ფაილის ატვირთვა *',
        name : 'file',
        required: true,
        value : null
    },
    fileId: {
        inputType : 'input',
        type : 'hidden',
        path : '',
        label: '',
        name : 'fileId',
        required: false,
        value : null
    },
};

const EditFeedback = ({ match }) => {

    const [ data , setData ] = useState(null);
    

    const fetchData = useCallback(() => {
            
            let lang = match.params.lang ? match.params.lang : 'ge';


            API.get(`${lang}/feedbacks/${match.params.id}`).then(res => {

                const resData = res.data.data;
                const apiData = { ...formObj };
  
                if(resData){
                    Object.keys(resData).forEach( item => {
                        if (apiData[item]) {
                            apiData[item].value = resData[item] ? resData[item] : '';
                                              
                        }

                        if (item === 'file_id') {
                            apiData['fileId'].value = resData[item] ? resData[item] : '';
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
                    <div className="col-lg-12">
                        <h1 className="page-header"> </h1>
                    </div>
                    <div className="container-fluid">
                        { data ? <Form 
                                    formData = { data } 
                                    module = 'feedbacks' 
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

export default EditFeedback;