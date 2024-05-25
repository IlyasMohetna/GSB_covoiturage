FROM debian:latest

RUN apt-get update && \
    apt-get install -y fail2ban iptables && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
CMD ["fail2ban-client", "-f", "start"]
