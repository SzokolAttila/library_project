import {defaultConfig} from '@formkit/vue'
import {generateClasses} from "@formkit/themes";
import { en } from '@formkit/i18n';

export default defaultConfig({
    rules: {
        beforeOrEqualToday: ({ value }) => {
            const inputDate = new Date(value);
            const today = new Date();
            return inputDate <= today;
        }
    },
    locale: 'en',
    locales: { en },
    messages: {
        en: {
            validation: {
                beforeOrEqualToday(){
                    return "Published date must be today or earlier."
                }
            }
        }
    },
    config: {
        classes: generateClasses({
            global: {
                form: 'w-[80%] md:w-[60%] lg:w-[45%] mx-auto',
                inner: 'w-full',
                wrapper: 'w-[60%] block mx-auto',
                messages: 'text-center',
            },
            select: {
                input: 'form-select w-full border border-2 border-orange-400'
            },
            radio:{
                input: 'form-radio'
            },
            checkbox:{
                input: 'form-checkbox'
            },
            textarea:{
                input: 'form-textarea border w-full border-2 border-orange-400'
            },
            submit: {
                input: 'bg-orange-400 block mx-auto text-white rounded py-2 px-4'
            }
        })
    }
})
