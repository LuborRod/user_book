                    INSTALLATION
(You have to install docker && docker-compose)

- Clone this repository from github
- Run script ``make init``
- Run script ``make migrations``

Now your host - localhost:8888. If you want to change port - you can edit docker-compose.yml


                    USING
I make API, that`s why you have to test requests from POSTMAN.                    

1 task - You`ve already done it, when you installed project by command ``make migrations``.

2 task - {your host}/group/index

    PARAMS - None
    
    RETURN - array of objects in JSON. For example - 
    
    ```
    "football": [
            {
                "name": "vasya",
                "register_date": "2020-10-10",
                "group_id": 1
            },
            {
                "name": "petya",
                "register_date": "2020-10-09",
                "group_id": 1
            }
        ],
        "basketball": [
            {
                "name": "misha",
                "register_date": "2020-10-13",
                "group_id": 2
            },
            {
                "name": "oleg",
                "register_date": "2020-10-08",
                "group_id": 2
            }
    ```
3 Task - {your_host}/group/create   

PARAMS POST - 

1) userName

2) groupName

RETURN boolean || Exception
    
                   