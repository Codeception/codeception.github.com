## Images built from Dockerfile

```
FROM fedora:20
 
RUN  yum install -y mongodb-server && yum clean all
 
RUN  mkdir -p /var/lib/mongodb && \
     touch /var/lib/mongodb/.keep && \
     chown -R mongodb:mongodb /var/lib/mongodb
 
ADD mongodb.conf /etc/mongodb.conf
 
VOLUME [ "/data/db" ]
 
EXPOSE 27017
 
USER mongodb
WORKDIR /var/lib/mongodb
CMD mongod
```