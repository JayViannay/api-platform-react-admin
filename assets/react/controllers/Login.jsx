import React from 'react';
import { useForm } from "react-hook-form";
import axios from 'axios';

export default () => {
    const {
        register,
        handleSubmit,
        formState: { errors }
    } = useForm({
        defaultValues: {
            email: "",
            password: ""
        }
    });

    return (
        <form
            onSubmit={handleSubmit((data) => {
                axios.post('/api/login', JSON.stringify(data), {headers : {
                    'Content-Type': 'application/json'
                }}).then((response) => {
                    console.log(response.data);
                });
            })}
        >
            <label>Email</label>
            <input {...register("email", { required: true })} />
            {errors.email && <p>This field is required</p>}
            <label>Password</label>
            <input
                {...register("password", { required: true, maxLength: 10 })}
            />
            {errors.password && <p>This field is required</p>}
            <input type="submit" />
        </form>
    );
}